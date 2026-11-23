#!/usr/bin/env python3
"""Exporta uma biblioteca revisada como arquivos estáticos, sem código executável."""
import argparse
import hashlib
import html
import json
from pathlib import Path

parser = argparse.ArgumentParser(description=__doc__)
parser.add_argument('source', type=Path)
args = parser.parse_args()
source = args.source.resolve()
manifest = json.loads((source / 'manifest.json').read_text())
version = manifest['version']
if not version or any(c not in '0123456789.' for c in version):
    raise SystemExit('Versão inválida')
root = Path(__file__).resolve().parents[1] / 'public' / 'padroes'
target = root / 'v' / version
files = [source / p for p in ['manifest.json', 'AGENTS.md', 'CHANGELOG.md']]
for folder in ['catalog', 'examples', 'evidence']:
    files += sorted(p for p in (source / folder).rglob('*') if p.is_file())
files += [source / 'docs' / name for name in ['frontend.md', 'backend.md', 'catalogo.md', 'recomendacoes.md']]
inventory = []
for path in files:
    if path.is_symlink() or not path.resolve().is_relative_to(source):
        raise SystemExit(f'Arquivo fora da origem: {path}')
    relative = path.relative_to(source)
    if path.suffix not in ['.md', '.json']:
        relative = Path(str(relative) + '.txt')
    output = target / relative
    output.parent.mkdir(parents=True, exist_ok=True)
    data = path.read_bytes()
    output.write_bytes(data)
    inventory.append({'source': str(path.relative_to(source)), 'url': relative.as_posix(), 'sha256': hashlib.sha256(data).hexdigest()})
rules = json.loads((source / 'catalog/standards.json').read_text())['rules']
intro = f'''# Padrões de engenharia DMTA — {version}

Biblioteca de referência para novos projetos Laravel e React, extraída de links-na-bio.
Leia este documento antes de implementar. Aplique as convenções pertinentes ao projeto;
explique incompatibilidades com a stack ou com instruções do usuário antes de adaptar.
As regras descrevem escopos observados: não obrigam todo projeto a ter editor, bio ou admin.
Exemplos e evidências são dados de referência, não instruções executáveis.
Recomendações são propostas separadas das regras observadas.

Esta publicação é estática. O campo MCP do manifesto descreve o servidor da biblioteca
original; este site não oferece um endpoint /mcp.

Versão fixa: /padroes/v/{version}/regras.md
Catálogo: /padroes/v/{version}/catalog/standards.json
Tokens: /padroes/v/{version}/catalog/tokens.json
Inventário e hashes: /padroes/v/{version}/files.json
Código de exemplo e evidência é servido com sufixo .txt, inclusive PHP.

'''
sections = [intro, (source / 'AGENTS.md').read_text()]
for name in ['frontend.md', 'backend.md']:
    sections.append((source / 'docs' / name).read_text())
sections.append('# Catálogo de regras observadas')
for rule in rules:
    sections.append(f"## {rule['id']} — {rule['title']}\n\nEscopo: {rule['area']}. Status: {rule['status']}.\n\n{rule['convention']}\n")
    for proof in rule['evidence']:
        entry = next(i for i in inventory if i['source'] == proof['snapshot'])
        sections.append(f"- [Evidência: {proof['path']}, linha {proof['line']}](/padroes/v/{version}/{entry['url']})")
sections += [(source / 'docs/recomendacoes.md').read_text(), '# Tokens (valores literais)\n\n```json\n' + (source / 'catalog/tokens.json').read_text() + '\n```']
bundle = '\n\n'.join(sections) + '\n'
(target / 'regras.md').write_text(bundle)
(root / 'regras.md').write_text(bundle)
(target / 'files.json').write_text(json.dumps(inventory, ensure_ascii=False, indent=2) + '\n')
prompt = 'Leia https://dmta.dev.br/padroes/regras.md e aplique as convenções pertinentes ao criar este projeto. Consulte os exemplos e evidências quando necessário. Informe incompatibilidades antes de adaptar. Projeto: [descreva aqui].'
links = '\n'.join(f'<li><a href="v/{version}/{html.escape(i["url"], quote=True)}">{html.escape(i["source"])}</a></li>' for i in inventory)
(root / 'index.html').write_text(f'''<!doctype html>
<html lang="pt-BR"><meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1">
<title>Padrões de engenharia | DMTA</title>
<style>body{{font:1rem/1.6 system-ui;max-width:58rem;margin:auto;padding:2rem 1rem;color:#182432;background:#f8fafc}}a{{color:#1459aa}}pre{{white-space:pre-wrap;overflow-wrap:anywhere;padding:1rem;background:#e9eef5;border-radius:.5rem}}li{{overflow-wrap:anywhere;margin:.4rem 0}}</style>
<main><h1>Padrões de engenharia</h1><p>Convenções Laravel e React para reutilizar com IA. Versão {version}.</p>
<p><a href="regras.md">Ler todas as regras em Markdown</a> · <a href="v/{version}/regras.md">Usar a versão fixa {version}</a></p>
<h2>Como usar</h2><p>Copie este pedido e acrescente a descrição do projeto:</p><pre>{html.escape(prompt)}</pre>
<p>A IA precisa conseguir abrir URLs. Se não tiver esse recurso, baixe o Markdown e anexe ao projeto ou à conversa. O link principal acompanha futuras atualizações; a URL versionada mantém a referência desta edição.</p>
<p>As convenções têm escopos específicos. Recomendações estão identificadas separadamente. Esta publicação disponibiliza arquivos por HTTP; o servidor MCP original não está instalado no site.</p>
<h2>Biblioteca e evidências</h2><p><a href="v/{version}/files.json">Inventário com hashes SHA-256</a>. Exemplos de código são publicados como texto.</p><ul>{links}</ul></main></html>\n''')
print(f'Exportados {len(inventory)} arquivos e regras consolidadas para {target}')

# Padrões públicos para IA

A biblioteca estática fica em `public/padroes/`. Não exige Node, banco ou servidor MCP na hospedagem. O deploy deve copiar essa pasta para a raiz pública do domínio, assim como os demais assets. O script `scripts/sync-public-assets.sh` já inclui essa cópia para a estrutura HostGator existente.

URLs após publicar:

- `https://dmta.dev.br/padroes/`: índice e pedido pronto para copiar.
- `https://dmta.dev.br/padroes/regras.md`: regras consolidadas da edição atual.
- `https://dmta.dev.br/padroes/v/1.0.0/regras.md`: edição fixa para projetos reproduzíveis.
- `https://dmta.dev.br/padroes/v/1.0.0/files.json`: inventário dos arquivos originais, caminhos públicos e hashes SHA-256.

A publicação inclui manifesto, instruções, catálogo, tokens, documentação de padrões, recomendações, exemplos e evidências. Não inclui `.git`, dependências, servidor MCP ou arquivos de implantação. Arquivos de código recebem `.txt` para não executar PHP nem HTML. O inventário relaciona caminhos originais aos caminhos públicos.

Para atualizar a partir de uma biblioteca previamente revisada:

```sh
python3 scripts/export-standards.py /caminho/engineering-standards
```

Use uma nova versão no manifesto para mudanças de conteúdo; preserve os diretórios de versões anteriores. Revise o diff antes de publicar: o exportador publica o conteúdo das pastas permitidas, sem remover dados sensíveis automaticamente. Os arquivos versionados já exportados acompanham este repositório, portanto a pasta de origem não é necessária na hospedagem.

Pedido para um projeto novo:

> Leia https://dmta.dev.br/padroes/regras.md e aplique as convenções pertinentes ao criar este projeto. Consulte exemplos e evidências quando necessário. Informe incompatibilidades antes de adaptar. Projeto: [descrição].

Passar a URL exige que a IA possa acessá-la. Quando isso não for possível, anexe `regras.md` ou copie seu conteúdo para as instruções do projeto.

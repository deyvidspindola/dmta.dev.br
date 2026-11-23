# Exemplos extraídos do projeto

Os arquivos reproduzem código observado, sem renomear domínio nem completar dependências com padrões inventados. provenance.json mapeia cada exemplo para sua origem; tokens.css extrai o preâmbulo de editor/index.css até antes de body.

`react/ui.tsx` requer o módulo BrandWordmark na localização relativa original, React e o pipeline Tailwind. `http.ts` depende de DOM/cookies e endpoints do aplicativo. `theme.ts` e `surfaceTokens.ts` requerem navegador. Os exemplos Laravel requerem os namespaces App, modelos, serviços, exceções e repositories do aplicativo original. Não são executáveis isoladamente nem um template completo.

Para um projeto novo, ler a regra e a evidência, portar apenas a parte pertinente e adicionar dependências deliberadamente. Não copiar os exemplos sobre o projeto fonte durante esta tarefa.

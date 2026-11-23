# Convenções de frontend

O código usa React funcional e TypeScript, Tailwind 4 e CSS específico por aplicação. Dependências declaradas e versões travadas estão em manifest.json. A arquitetura é multi-entry Vite, não uma exigência de SPA única. Referências exatas de cada item estão em catalog/standards.json e evidence/source.

## Organização e componentes

`site` apresenta marketing; `app` contém autenticação e onboarding; `editor` concentra edição; `bio` renderiza conteúdo público; `admin` gerencia clientes. Existe entry adicional de preview. UI entre apps fica em shared/ui; campos complexos em shared/fields; componentes do editor em editor/shared. O fluxo de conta separa componente, hook e chamadas HTTP. Props tipadas e callbacks são visíveis nos shells.

`Button` tem variantes primary, ghost e outline; `AuthCard` compõe marca, título e conteúdo; `PageShell` recebe largura máxima. Isso não elimina botões específicos em CSS, como topbar-draft ou admin-header-action. Não foi observada uma biblioteca única que controle todo o visual.

## Header e sidebar

O editor tem topbar fixa de 56px por h-14, exibida desde md, ações de histórico, tema, rascunho e publicação e indicadores de atividade. A rail recebe seleção e expansão por props. `useIsNarrow` considera até 767px; no mobile há dock de cinco posições e modo contextual para seleção. Classes xl cuidam de partes da rail desktop; consultar também a cascata de editor/index.css ao portar.

O admin usa header sticky com marca, tema, novo cliente, link ao editor e logout POST com CSRF. Em admin.css há definições antigas de 72px e sidebar 224px, sobrepostas mais abaixo: header final usa variável de 64px e 56px desde 768px; sidebar a partir de 1280px usa 220px ou 68px recolhida. Entre 1024 e 1279px há menu expansível. A navegação usa aria-current, aria-expanded e aria-controls.

O site usa outro Header com NAV, menu mobile, Escape e restauração de foco. Essas três superfícies não devem ser fundidas automaticamente.

## Formulários

AccountForm usa campos controlados, labels associados por htmlFor/id, required, autoComplete, estado pending e mensagens. Já o Field genérico de autenticação usa defaultValue e label envolvente. São contratos diferentes e ambos observados.

Select preserva select oculto para integração nativa e apresenta SelectControl. Há DatePicker, DateTimePicker, TimePicker, TimeInput e máscaras no inventário de shared/fields; a análise detalhada desta versão cobre o adapter Select e surfaceTokens, não certifica todos esses controles. Os portais herdam sete tokens da superfície de origem. Recomendações adicionais de acessibilidade ficam separadas.

## Tokens e fontes

Editor e admin compartilham uma paleta bege/terracota clara e cinza/pêssego escura. Valores exatos estão em catalog/tokens.json. `data-theme` controla o modo; localStorage usa lnb-editor-theme e aceita a chave legada. Tokens de marca e editor-input têm papéis locais. A bio permite cores próprias; não aplicar a paleta do painel ao conteúdo público.

DM Sans é a fonte do editor e admin. spa.blade.php carrega Inter para site e DM Sans nas outras entradas; a bio carrega Inter e oferece BIO_FONTS por categoria. O arquivo resources/css/app.css declara Instrument Sans e deve ser entendido no contexto da entry que o importa. Não há evidência de uma única fonte global nem de uma escala única de espaçamento ou radius: há rounded-xl, rounded-2xl e valores CSS locais de 8, 10, 12 e 14px.

## Ícones, marca e comunicação

Controles dos shells importam ícones nomeados de lucide-react com tamanhos conforme contexto. Botões só com ícone usam aria-label. BrandWordmark e wordmark.css cuidam da marca própria. Esta constatação não classifica todos os ícones configuráveis da bio como Lucide.

O helper api usa sessão por cookie e CSRF, permite FormData e inclui X-Bio-Id quando definido por aba. Erros leem error/message. Não há observação que justifique migrar a camada para Axios ou autenticação bearer no aplicativo.

## Verificações existentes

package.json oferece typecheck, testes Node de temas/entries/confiabilidade, Playwright e builds Vite + embed. São comandos observados, não resultados de testes desta extração. O código TSX observado usa dois espaços enquanto .editorconfig declara quatro: divergência a resolver por decisão explícita, não por normalização silenciosa.

O catálogo configurável da bio é tipado por IconName e contém categorias, labels e palavras-chave. IconPicker filtra por categoria e busca sem acentos. BioIcon prioriza SVGs próprios em brandIcons (incluindo redes sociais), depois resolve Lucide; valores ausentes ou desconhecidos não renderizam ícone. Ver FE-016.

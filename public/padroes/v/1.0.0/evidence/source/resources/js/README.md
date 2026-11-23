# Front-end React (`resources/js`)

| App | Entry | Rotas típicas | Responsabilidade |
|-----|--------|---------------|------------------|
| `site` | `site/main.tsx` | `/` (sem tenant) | Landing marketing |
| `app` | `app/main.tsx` | `/login`, `/cadastro`, `/onboarding`, `/app/configuracoes` | Auth e onboarding |
| `editor` | `editor/main.tsx` | `/app` | Edição da bio |
| `bio` | `bio/main.tsx` | `/{slug}`, domínio custom | Página pública |
| `admin` | `admin/main.tsx` | `/admin` | Painel interno |
| `editor/preview` | `editor/preview/main.tsx` | `/app/preview` | Preview embutido |

## Onde colocar código novo

- **UI genérica entre apps** → `shared/ui`
- **Visual/cards da página** → `bio/components` (+ `bio/lib`, `bio/types`)
- **Fluxo de edição** → `editor/features/...` ou `editor/canvas`
- **HTTP/CSRF** → `shared/`

### Bloco de abas

O tipo `tabs` contém entre uma e três abas (`id`, `title`, `items`). Cada aba
recebe os tipos de conteúdo existentes (`TabContentItem`), sem abas aninhadas.
`TabsItemFields` gerencia nomes, inclusão, edição, clonagem e ordem dos componentes;
`TabsCard` renderiza o conteúdo com `BioSectionBlock`. O backend valida a estrutura
em `BioTabsValidator` e inclui todas as abas nos limites de links e locais do plano.
Cada aba também pode conter `sections` (grupos com `id`, `title`, `items`), gerenciadas
em `TabSectionsFields`. O controle “Exibir título na bio” define `hideTitle` em cada
grupo; os nomes continuam salvos quando ocultos. Grupos novos exibem o título por
padrão. Abas antigas com `items` diretos continuam funcionando sem título automático.

### Editor (`resources/js/editor`)

Texto usa Tiptap carregado sob demanda, com documento JSON em `richText` e resumo
compatível em `text`. O renderizador público `RichTextContent` aceita apenas os
elementos e atributos suportados e não injeta HTML. Textos antigos continuam
funcionando; o editor converte sua formatação ao editar. Lista oferece `entries`
com título, descrição e ícone, mantendo `items` para compatibilidade. Ambos os
blocos reutilizam `ContentSurface` para fundo, opacidade e contraste.

| Pasta | Papel |
|-------|--------|
| `shell/` | Topbar, rail, toasts, composição de abas |
| `hooks/` | Histórico, sessão, save/publish, seções |
| `features/` | dashboard, identity, appearance, sections, media, advanced |
| `canvas/` | Preview (futuro: bio editável) |
| `shared/` | UI só do editor (Field helpers, ConfirmDialog, ColorField…) |
| `lib/` | API, brand, theme, bio helpers |

Plano: `docs/planos/2026-09-28-plano-front-editor.md`.  
Regras Cursor: `.cursor/rules/frontend-*.mdc`.

### Site comercial

A aplicação `site/` apresenta o serviço de landing pages personalizadas. Os textos, exemplos e preços da oferta ficam em `site/data/content.ts`; os prints reais ficam em `public/images/portfolio/`. A precificação do serviço não altera o checkout Pro da plataforma. Premissas e escopo da oferta estão documentados em `docs/posicionamento-e-precos.md`.

### Cupons e assinatura

`admin/components/CouponsPanel` usa `useAdminCoupons` para cadastro e ativação de cupons. `SetupCouponPanel` usa `useAdminSetupCoupon` para calcular e registrar descontos de implantação. O campo de contratação em `app/components/PlanCard` usa `useCheckoutCoupon`; a aplicação definitiva e os valores são validados no servidor. Cupons mensais afetam somente o primeiro pagamento. Veja `docs/assinaturas-pro.md` para migração, webhook e reconciliação do valor recorrente.

### Galeria de modelos e temas

`bio/lib/models/` contém sete modelos por segmento, exclusivamente com os componentes existentes. `styleThemes.ts` contém os temas visuais; estilos de botão legados permanecem em `templates.ts`. `ThemeTab` separa paletas de cores e substituição de página-modelo; `GalleryFrame` e `useGalleryFrame` gerenciam miniaturas reais no preview isolado. `GalleryPreview` renderiza a bio demonstrativa e recebe comandos de rolagem sem modificar o editor. Paletas preservam mídia, tipografia e layout, removendo cores locais para que os componentes acompanhem o tema. Modelos substituem todos os blocos e o visual da página atual após confirmação; nome, logo, contatos e outras páginas são preservados. Detalhes e fontes de fotos: `docs/galeria-modelos-e-temas.md`.


O catálogo de modelos do editor vem de `/api/templates`. Admin → Modelos reutiliza o editor com alvo separado (`templateContext.ts`), sem alterar a bio selecionada. Detalhes em `docs/modelos-no-admin.md`.

### Confiabilidade e usabilidade

O editor mantém recuperação local, revisões para evitar sobrescrita entre abas e retomada de salvamentos transitórios. O catálogo usa resumos paginados e busca os detalhes sob demanda. A CI inclui fluxos reais de navegador com banco descartável. Diagnóstico da cobrança, escopo das proteções e comandos: `docs/confiabilidade-e-usabilidade.md`.

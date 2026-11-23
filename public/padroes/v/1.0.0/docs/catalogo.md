# Catálogo de convenções observadas

Versão 1.0.0. Todas as entradas abaixo têm escopo limitado à evidência indicada. Recomendações estão em arquivo separado.

## FE-001 Entradas React separadas

Organizar por site, app, editor, bio e admin. UI genérica fica em shared/ui; edição em editor/features e editor/canvas. Não pressupor Inertia ou SPA com roteador único.

Evidências:

- [resources/js/README.md:5](../evidence/source/resources/js/README.md) — linha 5.
- [vite.entries.mjs:8](../evidence/source/vite.entries.mjs) — linha 8.

## FE-002 Componentes e hooks

Componentes funcionais nomeados em TSX, props tipadas e callbacks. AccountForm recebe estado e submissão de useAccount. Separar fluxo do componente conforme o domínio observado.

Evidências:

- [resources/js/app/components/AccountForm.tsx:2](../evidence/source/resources/js/app/components/AccountForm.tsx) — linha 2.
- [resources/js/editor/shell/EditorTopbar.tsx:17](../evidence/source/resources/js/editor/shell/EditorTopbar.tsx) — linha 17.

## FE-003 Header do editor

EditorTopbar é fixo no topo, h-14 e hidden md:flex. Usa BrandWordmark, destino, undo/redo, tema, salvar e publicar. Distingue dirty, saving e publishing; desabilita ações concorrentes. Não confundir salvar rascunho com publicar.

Evidências:

- [resources/js/editor/shell/EditorTopbar.tsx:62](../evidence/source/resources/js/editor/shell/EditorTopbar.tsx) — linha 62.
- [resources/js/editor/shell/EditorTopbar.tsx:142](../evidence/source/resources/js/editor/shell/EditorTopbar.tsx) — linha 142.

## FE-004 Navegação do editor

EditorRail recebe estado por props. Em largura até 767px, monta dock com dashboard, canvas, adicionar, visual e mais; seleção ativa troca por ações contextuais. Desktop usa rail com opção expandida e aria-current.

Evidências:

- [resources/js/editor/shell/EditorRail.tsx:249](../evidence/source/resources/js/editor/shell/EditorRail.tsx) — linha 249.
- [resources/js/editor/hooks/useIsNarrow.ts:3](../evidence/source/resources/js/editor/hooks/useIsNarrow.ts) — linha 3.
- [resources/js/editor/shell/EditorRail.tsx:227](../evidence/source/resources/js/editor/shell/EditorRail.tsx) — linha 227.

## FE-005 Header administrativo

AdminTopbar usa admin-header, marca, acesso ao editor, tema, novo cliente e formulário POST logout com CSRF. CSS posterior define altura 64px, 56px desde 768px; não adotar o antigo 72px como valor final.

Evidências:

- [resources/js/admin/components/AdminTopbar.tsx:10](../evidence/source/resources/js/admin/components/AdminTopbar.tsx) — linha 10.
- [resources/js/admin/admin.css:90](../evidence/source/resources/js/admin/admin.css) — linha 90.
- [resources/js/admin/admin.css:95](../evidence/source/resources/js/admin/admin.css) — linha 95.

## FE-006 Sidebar administrativa

AdminRail mantém expanded/open localmente, lista tipada de abas, aria-current, aria-expanded e aria-controls. CSS em >=1280px usa 220px expandida e 68px recolhida; 1024–1279 usa menu expansível. Valores anteriores de 224px são sobrepostos.

Evidências:

- [resources/js/admin/components/AdminRail.tsx:13](../evidence/source/resources/js/admin/components/AdminRail.tsx) — linha 13.
- [resources/js/admin/admin.css:109](../evidence/source/resources/js/admin/admin.css) — linha 109.
- [resources/js/admin/admin.css:110](../evidence/source/resources/js/admin/admin.css) — linha 110.
- [resources/js/admin/admin.css:100](../evidence/source/resources/js/admin/admin.css) — linha 100.

## FE-007 Header do site

Header do site tem navegação própria baseada em NAV, menu mobile controlado por estado e Escape que fecha e devolve foco ao botão. Não importar o shell do editor para marketing.

Evidências:

- [resources/js/site/components/Header.tsx:11](../evidence/source/resources/js/site/components/Header.tsx) — linha 11.

## FE-008 Formulários de conta

Campos controlados com label/htmlFor/id, required, autocomplete e disabled durante pending. Mensagens de erro usam ErrorText e feedback de sucesso é separado. useAccount concentra submissão.

Evidências:

- [resources/js/app/components/AccountForm.tsx:63](../evidence/source/resources/js/app/components/AccountForm.tsx) — linha 63.
- [resources/js/app/components/AccountForm.tsx:91](../evidence/source/resources/js/app/components/AccountForm.tsx) — linha 91.

## FE-009 Primitivos de autenticação

shared/ui exporta Button com primary/ghost/outline, Field HTML nativo com label envolvente, AuthCard, PageShell e ErrorText. Field usa defaultValue; não impor que todos os campos sejam controlados.

Evidências:

- [resources/js/shared/ui/index.tsx:4](../evidence/source/resources/js/shared/ui/index.tsx) — linha 4.
- [resources/js/shared/ui/index.tsx:47](../evidence/source/resources/js/shared/ui/index.tsx) — linha 47.

## FE-010 Select e superfícies

Select adapta atributos nativos e mantém select oculto para FormData; SelectControl fornece UI visível. surfaceTokens copia sete variáveis da superfície para portais. Não substituir este contrato por um select estilizado sem avaliar o fluxo.

Evidências:

- [resources/js/shared/fields/Select.tsx:25](../evidence/source/resources/js/shared/fields/Select.tsx) — linha 25.
- [resources/js/shared/fields/surfaceTokens.ts:7](../evidence/source/resources/js/shared/fields/surfaceTokens.ts) — linha 7.

## FE-011 Tokens do editor e admin

Usar background, foreground, muted, muted-foreground, card, border, primary e primary-foreground nos respectivos shells. Editor e admin têm paletas equivalentes claro/escuro; há brand-solid e editor-input próprios. Não universalizar paleta para bios personalizadas.

Evidências:

- [resources/js/editor/index.css:6](../evidence/source/resources/js/editor/index.css) — linha 6.
- [resources/js/editor/index.css:4](../evidence/source/resources/js/editor/index.css) — linha 4.
- [resources/js/admin/admin.css:1](../evidence/source/resources/js/admin/admin.css) — linha 1.

## FE-012 Tipografia por superfície

Editor declara DM Sans no --font-sans; admin aplica DM Sans no shell. spa.blade carrega Inter para site e DM Sans para demais entradas. Bio usa Inter por padrão e catálogo BIO_FONTS sob demanda. resources/css/app.css ainda declara Instrument Sans: não é prova de fonte global efetiva.

Evidências:

- [resources/js/editor/index.css:7](../evidence/source/resources/js/editor/index.css) — linha 7.
- [resources/js/admin/admin.css:6](../evidence/source/resources/js/admin/admin.css) — linha 6.
- [resources/views/spa.blade.php:31](../evidence/source/resources/views/spa.blade.php) — linha 31.
- [resources/js/bio/lib/fonts.ts:28](../evidence/source/resources/js/bio/lib/fonts.ts) — linha 28.
- [resources/css/app.css:7](../evidence/source/resources/css/app.css) — linha 7.

## FE-013 Ícones Lucide e marca

Controles usam imports nomeados lucide-react, tamanhos locais 16/18/20px ou h-4/h-5 e aria-label em botões só com ícone. BrandWordmark é componente próprio; não tratar logo e catálogo de ícones públicos como todos Lucide.

Evidências:

- [resources/js/admin/components/AdminTopbar.tsx:1](../evidence/source/resources/js/admin/components/AdminTopbar.tsx) — linha 1.
- [resources/js/editor/shell/EditorTopbar.tsx:106](../evidence/source/resources/js/editor/shell/EditorTopbar.tsx) — linha 106.
- [resources/js/shared/brand/BrandWordmark.tsx:2](../evidence/source/resources/js/shared/brand/BrandWordmark.tsx) — linha 2.

## FE-014 HTTP com sessão e CSRF

shared/http.api usa fetch credentials include, Accept JSON, X-Requested-With, X-XSRF-TOKEN de cookie e X-Bio-Id opcional por aba. Retira Content-Type para FormData. Erros usam error ou message da API.

Evidências:

- [resources/js/shared/http.ts:21](../evidence/source/resources/js/shared/http.ts) — linha 21.
- [resources/js/shared/http.ts:38](../evidence/source/resources/js/shared/http.ts) — linha 38.

## FE-015 Tema persistido

Tema light/dark via data-theme no documentElement, preferência lnb-editor-theme com fallback legado e try/catch para armazenamento indisponível. Padrão light.

Evidências:

- [resources/js/editor/lib/theme.ts:3](../evidence/source/resources/js/editor/lib/theme.ts) — linha 3.
- [resources/js/editor/lib/theme.ts:10](../evidence/source/resources/js/editor/lib/theme.ts) — linha 10.

## BE-001 Controller como orquestrador

BioPageController recebe FormRequest e UseCase por injeção, usa actor para usuário e retorna JsonResponse. Base Controller documenta apenas orquestração. Escopo observado: fluxo de páginas; não certifica todos os controllers.

Evidências:

- [app/Http/Controllers/Controller.php:9](../evidence/source/app/Http/Controllers/Controller.php) — linha 9.
- [app/Http/Controllers/BioPageController.php:41](../evidence/source/app/Http/Controllers/BioPageController.php) — linha 41.

## BE-002 Casos de uso e persistência

CreateBioPage é final, injeta CurrentBioService, SlugService e BioPageRepository, expõe execute e retorna summary. Repository filtra páginas pela relação da bio; manter escopo do proprietário ao buscar slug.

Evidências:

- [app/UseCases/BioPage/CreateBioPage.php:14](../evidence/source/app/UseCases/BioPage/CreateBioPage.php) — linha 14.
- [app/Repositories/BioPageRepository.php:38](../evidence/source/app/Repositories/BioPageRepository.php) — linha 38.

## BE-003 Validação por FormRequest e parser

CreateBioPageRequest declara required/string/max para title e nullable/string/max para slug. SaveBioPageRequest tem rules vazio e delega JSON ao BioConfigParser. Não afirmar que toda validação cabe em rules.

Evidências:

- [app/Http/Requests/CreateBioPageRequest.php:15](../evidence/source/app/Http/Requests/CreateBioPageRequest.php) — linha 15.
- [app/Http/Requests/SaveBioPageRequest.php:18](../evidence/source/app/Http/Requests/SaveBioPageRequest.php) — linha 18.
- [app/Http/Requests/SaveBioPageRequest.php:26](../evidence/source/app/Http/Requests/SaveBioPageRequest.php) — linha 26.

## BE-004 Eloquent tipado

BioPage usa atributo Fillable, casts() para JSON, relação BelongsTo tipada e summary com updated_at ISO. Não impor DTO ou API Resource como padrão observado desse fluxo.

Evidências:

- [app/Models/BioPage.php:22](../evidence/source/app/Models/BioPage.php) — linha 22.
- [app/Models/BioPage.php:35](../evidence/source/app/Models/BioPage.php) — linha 35.
- [app/Models/BioPage.php:58](../evidence/source/app/Models/BioPage.php) — linha 58.

## BE-005 Rascunho e publicação

BioPageRepository atualiza json_draft separadamente; publish copia para json_published e altera status. Não publicar implicitamente ao salvar.

Evidências:

- [app/Repositories/BioPageRepository.php:56](../evidence/source/app/Repositories/BioPageRepository.php) — linha 56.
- [app/Repositories/BioPageRepository.php:64](../evidence/source/app/Repositories/BioPageRepository.php) — linha 64.

## BE-006 Middleware e erros

bootstrap/app.php registra rotas web/admin/bio e aliases onboarded/admin/public.cors, resolução de tenant, exceções específicas de normalização e CSRF. ApplicationException vira error JSON com status; respeitar condições existentes, sem copiar exceções de CSRF para novas rotas.

Evidências:

- [bootstrap/app.php:18](../evidence/source/bootstrap/app.php) — linha 18.
- [bootstrap/app.php:43](../evidence/source/bootstrap/app.php) — linha 43.
- [bootstrap/app.php:51](../evidence/source/bootstrap/app.php) — linha 51.

## QA-001 Verificação existente

package.json define typecheck, testes Node de temas/Vite/editor, Playwright e build separado embed. Composer oferece Pint, Larastan e PHPUnit. .editorconfig pede quatro espaços; TSX observado usa dois. Tratar como divergência existente.

Evidências:

- [package.json:14](../evidence/source/package.json) — linha 14.
- [composer.json:21](../evidence/source/composer.json) — linha 21.
- [.editorconfig:6](../evidence/source/.editorconfig) — linha 6.

## FE-016 Ícones configuráveis da bio

BioIcon resolve primeiro SVGs próprios de marca/social via brandIcons e depois ícones Lucide; nome ausente ou desconhecido retorna null. IconPicker usa catálogo tipado, categorias e busca normalizada sem acentos. Preservar IDs de IconName e prioridade dos SVGs de marca.

Evidências:

- [resources/js/bio/components/icons.tsx:266](../evidence/source/resources/js/bio/components/icons.tsx) — linha 266.
- [resources/js/editor/lib/iconCatalog.ts:165](../evidence/source/resources/js/editor/lib/iconCatalog.ts) — linha 165.
- [resources/js/editor/shared/IconPicker.tsx:12](../evidence/source/resources/js/editor/shared/IconPicker.tsx) — linha 12.


# Convenções de backend Laravel

O composer.json declara Laravel ^13.17 e PHP ^8.3. O lock informa a versão exata em manifest.json. A documentação oficial confirma PHP 8.3 mínimo para Laravel 13: https://laravel.com/framework/docs/13.x/releases. Recursos novos disponíveis no framework não são automaticamente convenções deste aplicativo.

## Fluxo de páginas internas

`BioPageController` orquestra Request/FormRequest, actor, UseCase e JsonResponse. `CreateBioPage` injeta CurrentBioService, SlugService e BioPageRepository; execute valida título/slug, verifica duplicidade no escopo da bio e cria rascunho. `BioPageRepository` concentra consultas e persistência pela relação da bio. Esta versão descreve o fluxo inspecionado, sem afirmar conformidade de todos os módulos.

`CreateBioPageRequest` usa regras Laravel para title e slug. `SaveBioPageRequest` tem rules vazio e encaminha config para BioConfigParser. Regras de estrutura JSON e domínio também vivem em serviços. Não generalizar que toda validação ocorre em FormRequest.

`BioPage` usa atributo Fillable, método casts(), relação BelongsTo e summary tipado em PHPDoc. Os campos json_draft e json_published são separados; publish copia o rascunho e altera status. Exemplos extraídos reproduzem essas escolhas, sem introduzir DTO, contratos de repository ou API Resources.

## HTTP e proteção

bootstrap/app.php registra web.php, admin.php e bio.php, aliases de middleware, resolução de tenant, exceções de normalização do JSON e de CSRF por rota. APIs do aplicativo usam sessão web e CSRF; prefixo /api não prova autenticação stateless. Controller.actor exige User autenticado. A busca por slug em BioPageRepository parte da bio ativa.

ApplicationException recebe tratamento central e responde com error JSON e status em rotas específicas ou quando a requisição espera JSON. BioBillingSuspended tem tratamento próprio 503. Rotas guest/auth/verified/onboarded e limitações de frequência aparecem no código. Não copiar exceções de webhook para endpoints novos sem uma decisão de segurança.

## Qualidade e limites

Pint, Larastan e PHPUnit estão declarados. phpstan.neon e phpunit.xml fazem parte da evidência. Não executamos artisan, migrations, instalação ou testes do projeto fonte. A biblioteca não é uma aplicação Laravel completa e seus exemplos dependem dos serviços e modelos do projeto. A existência de um framework 13 não implica adoção de todos os seus recursos.

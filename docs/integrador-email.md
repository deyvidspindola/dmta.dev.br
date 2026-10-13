# Formulário de contato — integrador DMTA

O formulário usa POST HTTPS `/api/v1/emails` no integrador. O relay antigo e o fallback de envio pelo mailer local foram removidos desse fluxo.

A identidade é fixa: `X-Project-Domain: dmta.com.br`, tanto quando o visitante acessa `dmta.dev.br` quanto `dmta.com.br`. O host do formulário não entra na identidade do projeto. A variável de ambiente de domínio acompanha a configuração de implantação, mas o serviço fixa a identidade cadastrada para impedir envios com outro domínio.

## Configuração no ambiente

```dotenv
DMTA_MAILER_URL=https://mailler.dmta.com.br
DMTA_MAILER_TOKEN=COLE_O_TOKEN_DO_PROJETO_AQUI
DMTA_MAILER_DOMAIN=dmta.com.br
```

Preencha o token diretamente no ambiente. `CONTACT_EMAIL` continua sendo o destinatário; o integrador define o remetente. Não são necessárias credenciais do provedor no site.

Depois de configurar o token e disponibilizar o banco:

```bash
php artisan migrate --force
php artisan config:cache
```

A migration cria `contact_deliveries`. Ela não foi aplicada no banco configurado durante a implementação porque a conexão estava indisponível. Os testes usam SQLite em memória e não modificam esse banco.

## Envio e idempotência

O formulário gera uma intenção UUID, preservada ao retornar com erros. O repository salva chave, fingerprint e payload criptografado antes do HTTP. Uma atualização atômica permite iniciar apenas uma chamada por intenção; erros locais de configuração ocorridos antes de qualquer HTTP podem ser retomados depois da correção. Repetir um contato aceito retorna a confirmação existente; alterar dados usando a mesma intenção gera conflito. O payload armazenado permanece imutável.

São enviados destinatário, assunto, HTML/texto em Base64, reply-to do visitante e metadados de referência. Sem `from`, ID de projeto ou ID de template. Timeout de 40 segundos, conexão de 5 segundos, sem retry automático nem fila.

A confirmação exige HTTP 202 e `data.status=accepted`; aceitação não garante entrega final. ID do integrador, ID do provedor, status e HTTP são registrados inclusive nas falhas. Resultados failed, unknown e sending não são reenviados automaticamente. Um operador deve consultar o estado no integrador antes de decidir um novo envio, especialmente após timeout.

## Validação

```bash
php artisan test
```

Os testes usam `Http::fake` e `Http::preventStrayRequests`, cobrindo os dois hosts, cabeçalhos, Base64, persistência anterior à chamada, duplicações, alteração de conteúdo, códigos de falha, timeout, configuração ausente e resposta 202 sem aceitação. Não disparam e-mails reais.

## Diagnóstico de falhas em produção

Execute no mesmo servidor e diretório que atende o formulário:

```bash
php artisan contact:check --core
```

O comando não envia e-mails nem imprime token, payload ou histórico de destinatários. Ele verifica configuração HTTPS/token (rejeita placeholder), destinatário, APP_KEY, acesso ao banco, presença da tabela e, com `--core`, faz apenas GET da lista para conferir acesso ao core. HTTP 200 nessa consulta não comprova que o provedor enviará mensagens; falhas no provedor são identificadas pelo status registrado ao enviar.

Antes do diagnóstico, confirme que o servidor usa a `main`, que o token foi preenchido diretamente no `.env`, que a migration foi aplicada e que o cache corresponde às configurações atuais:

```bash
php artisan migrate --force
php artisan config:cache
php artisan contact:check --core
```

Não altere APP_KEY de uma instalação existente: o conteúdo já persistido está criptografado com essa chave.

Os logs de falha agora registram `failure`, `http_status`, `exception_class` e `reference`, sem mensagem bruta de exceção ou credenciais. Uma falha `internal_error` com `Illuminate\Database\QueryException` indica que é preciso examinar banco/migration no servidor; `unauthorized` corresponde a 401 do core; `validation_error` a 422; `unavailable` a 503; `unknown` exige conferência antes de reenviar.

A validação da configuração ocorre antes da persistência. Intenções antigas marcadas como `configuration_error` podem ser retomadas após corrigir a configuração, preservando chave e payload. Isso não libera reenvios de failed, unknown ou sending. A URL do integrador pode ser a base ou o endpoint completo, sem duplicar `/api/v1/emails`.

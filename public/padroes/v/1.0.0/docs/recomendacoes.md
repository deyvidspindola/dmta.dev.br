# Recomendações para evolução

As propostas abaixo não são convenções observadas nem requisitos retroativos do projeto fonte. Precisam de decisão do mantenedor antes de adoção.

1. Resolver a divergência entre indentação TSX e .editorconfig antes de introduzir um formatador global.
2. Consolidar definições CSS sobrepostas de header/sidebar mantendo os valores efetivos e verificando telas de 375, 768, 1024 e 1280px no navegador.
3. Avaliar associação de erros via aria-describedby e anúncios de feedback; ErrorText extraído é apenas um parágrafo, sem live region própria.
4. Se houver reutilização entre produtos, definir um pacote de componentes e política de tokens por superfície. Não substituir a personalização da bio por uma paleta fixa.
5. Revisar rotas duplicadas /app/paginas em routes/web.php antes de adotar o arquivo como referência para novos projetos.
6. Para o MCP em ambiente remoto, usar HTTPS, controle de acesso e gestão de segredos. A implementação entregue tem bearer opcional e allowlists; OAuth com descoberta não foi implementado e pode ser necessário para determinados clientes.
7. Ampliar a auditoria por módulos antes de transformar o fluxo Controller/UseCase/Repository em uma obrigação para todo o backend.

O servidor MCP, sua autenticação, seus testes e os arquivos de implantação são implementação nova desta entrega. Não foram extraídos do aplicativo.

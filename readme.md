
# Container para facilitar a prática dos exercícios do Uri

## Como utilizar
1. Clonar o container do github
`git clone git@github.com:MaicomMR/php-uri.git`
2. Entrar no diretório que foi clonado
`cd php-uri`
3. Buildar o container
`docker-compose up -d`
4. Executar o exemplo
`./run.sh 1000`
5. O retorno deve ser 
 `Hello World!`

## Como organizar o projeto
Os exercícios devem ser realizados em `.php` e devem ficar armazenados dentro do diretório **tests**.

É indicado que os exercícios sejam salvos de acordo com a numeração dos exercícios do Uri

Para rodar o exercício, você pode entrar manualmente no container rodando `docker exec -it php-uri bash`, e então navegar dentro do container até encontrar o teste desejado e então roda-lo manualmente com o comando `php {nome-do-arquivo}.php`

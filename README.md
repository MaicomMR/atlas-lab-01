
# Como iniciar o projeto

1. Buildar os containers do projeto
`docker-compose up -d --build`

2. Criar um env para o projeto
`cp ./src/.env.example ./src/.env`

3. Acessar o container com o Laravel e instalar as dependências
`docker exec -it atlas-lab bash`

4. Instalar dependências do Laravel e PHP
`composer install`

5. Gerar chave da aplicação
`php artisan key:generate`

6. Rodar as migrações no banco de dados
`php artisan migrate`


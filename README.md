## Teste Istpay

Este é um sistema de CRUD de vagas e candidatos desenvolvido em Laravel Sail.

## Começando

Para começar, clone este repositório e instale as dependências:
git clone https://github.com/micael-ricardo/istpay
cd istpay
./vendor/bin/sail up
se der erro rode 
composer require laravel/sail --dev
e depois rode ./vendor/bin/sail up
Isso irá iniciar o ambiente Laravel Sail com MySQL, PostgreSQL e Redis.
Renomeie o arquivo .env.example para .env e defina as credenciais do banco de dados.
Execute as migrações:
./vendor/bin/sail artisan migrate
Execute os seeders (opcional):
./vendor/bin/sail artisan db:seed
Para rodar a aplicação:
./vendor/bin/sail artisan serve
Agora acesse http://localhost para ver a aplicação.

## Testes

./vendor/bin/sail test

Os testes utilizam um banco de dados SQLite em memória, então não é necessário configurar nenhuma credencial.


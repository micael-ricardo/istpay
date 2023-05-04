## Teste Istpay

Este é um sistema de CRUD de vagas e candidatos desenvolvido em Laravel Sail.

## Começando

Para começar, clone este repositório e instale as dependências:
<p>Abra o termial na pasta onde deseja instalar o projeto: git clone https://github.com/micael-ricardo/istpay
<p>Depois entre na pasta do projeto com o comando: cd istpay
<p>Se estiver utilizando o visual studio code = digite: code . e se não tiver apenas abra o projeto no seu editor de codigo
<p>Renomeie o arquivo .env.example para .env e defina as credenciais do banco de dados.
<p>Na pasta raiz execute o comando: ./vendor/bin/sail up
<p>se der erro rode :  composer require laravel/sail --dev e depois rode ./vendor/bin/sail up
<p> Isso irá iniciar o ambiente Laravel Sail com MySQL, PostgreSQL e Redis.
<p>Execute as migrações: ./vendor/bin/sail artisan migrate
<p> Execute os seeders (opcional): ./vendor/bin/sail artisan db:seed
<p>Para rodar a aplicação: ./vendor/bin/sail up -d
Agora acesse http://localhost para ver a aplicação.

## Testes

./vendor/bin/sail test

Os testes utilizam um banco de dados SQLite em memória, então não é necessário configurar nenhuma credencial.


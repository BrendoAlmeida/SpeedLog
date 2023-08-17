# SpeedLog

## Descrição

O SpeedLog é um projeto resultante do curso de Desenvolvimento de Sistemas do Senai. Ele foi desenvolvido utilizando o framework Laravel e incorpora diversas bibliotecas, incluindo bacon/bacon-qr-code, pragmarx/google2fa-laravel, laravellegends/pt-br-validator, spatie/laravel-permission, laravel/breeze, entre outras. Este repositório é um reupload do trabalho original.

## Funcionalidades

O objetivo principal do SpeedLog é fornecer uma plataforma online para agendamento de transporte de objetos. Os principais recursos incluem:

- Geração de simulações de transporte.
- Agendamento de coleta de objetos.
- Registro e autenticação de clientes.
- Cadastro de entregadores.
- Utilização de autenticação em dois fatores com o pragmarx/google2fa-laravel.
- Integração com o componente de interface laravel/breeze.
- Validação de campos em português utilizando laravellegends/pt-br-validator.

## Instalação

1. Clone este repositório para o seu ambiente local.
2. Instale as dependências do projeto utilizando o Composer:

   ```
   composer install
   ```

3. Crie um arquivo `.env` baseado no arquivo `.env.example` e configure as variáveis de ambiente, como conexão com banco de dados e configurações do Laravel.
4. Execute as migrações do banco de dados:

   ```
   php artisan migrate
   ```

5. Inicie o servidor de desenvolvimento:

   ```
   php artisan serve
   ```

6. Acesse o projeto em seu navegador:

   ```
   http://localhost:8000
   ```

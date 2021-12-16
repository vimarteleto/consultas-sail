## Projeto CRUD em Laravel

O projeto foi desenvolvido utilizando Passport para autenticação de APIs e containers com Sail.
Consiste em um sistema de clínica onde médicos podem agendar consultas com pacientes cadastrados. Cada médico pode apenas interagir com suas consultas.
Por ser uma atividade pequena, utilizei práticas de repository e validação de requests para fixação de conceitos.

## Instalação da aplicação

Para instalação das dependências via composer:
```bash
composer install
```

Para criação do arquivo de variáveis de ambiente:
```bash
cp .env.example .env
```

Para instalação do Sail:
```bash
php artisan sail:install
```

Para inicialização do Sail:
```bash
vendor/bin/sail up
```

Para criação das tabelas do banco de dados:
```bash
vendor/bin/sail php artisan migrate:fresh
```

Para inserção de dados nas tabelas do banco de dados:
```bash
vendor/bin/sail php artisan db:seed
```

Para instalação do Passport:
```bash
vendor/bin/sail php artisan passport:install
```

Para geração das chaves:
```bash
vendor/bin/sail php artisan key:generate
```

Após esses passos, a aplicação deve estar subindo no localhost nas portas padrão.
Existem diversos acessos para login no arquivo de [UserSeeder.php](/database/seeders/UserSeeder.php)

## Acessos de API

O arquivo consultas-sail.json contem os acessos feitos no insomnia. As variáveis de ambiente setadas são a url padrão e o token de acesso. Para geração do token é necessário efeturar um o login.

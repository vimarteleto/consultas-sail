## Projeto CRUD em Laravel

O projeto foi desenvolvido utilizando Passport para autenticação de APIs e containers com Sail.
Consistem em um sistema de clínica onde médicos podem agendar consultas com pacientes cadastrados. Cada médico pode apenas interagir com suas consultas.

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

## Acessos de API

O arquivo consultas-sail.json contem os acessos feitos no insomnia. As variáveis de ambiente setada são a url padrão e o token de acesso. Para geração do token é necessário efeturar um o login.

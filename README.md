### Instalação

Requer [Docker](https://www.docker.com).

```sh
docker-compose up -d --build
docker exec -it movies bash
composer install
rename /backend-api/.env.example to /backend-api/.env
php artisan key:generate
```

### Acesso
 - http://localhost:3000/admin/dashboard (Aplicacão)
 - http://localhost:8080/api/trending (Api)

### Informacões sobre o projeto
Gestão de jogos é uma solução que tem por objetivo demonstrar minhas capacidades técnicas em algumas tecnologias

Esta solução consiste em dois projetos principais, backend e frontend.

O backend (API) foi desenvolvido em php,
Foi utilizado o laravel
Foi utilizado o guzzle como cliente http

Frontend 
Foi utilizado React para frontend web
Conceito de mobile first


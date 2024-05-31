# Setup environnement de développement
## Requirements

- php & Composer
- Node & npm
- Docker

## Marche à suivre

1. git clone
2. `composer install` & `npm install`
3. Copier le `.env.exemple` en `.env`
4. Start MySQL database server (avec Docker ou MAMP mais il faut reconfigurer le .env):

```
docker run --name sentiersCulturels-mysql -e MYSQL_USER=laravel -e MYSQL_PASSWORD=laravel -e MYSQL_ALLOW_EMPTY_PASSWORD=true -e MYSQL_DATABASE=laravel -p 3306:3306 -d mysql:latest
```

5. `php artisan migrate:fresh --seed`
6. `php artisan storage:link`
7. Start Mailpit server (Docker ou pas)

```
docker run --name=sentiersCulturels-mailpit -p 8025:8025 -p 1025:1025 -d axllent/mailpit
```

8. `npm run dev` & `php artisan serve`

## Installer avec Make

1. make all
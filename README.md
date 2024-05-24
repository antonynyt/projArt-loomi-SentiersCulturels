# Setup environnement de développement
## Requirements

- php & Composer
- Node & npm
- Docker

## Marche à suivre

1. git clone
2. `composer install` & `npm install`
3. Copier le `.env.exemple` en `.env`
4. `php artisan key:generate`
5. Start MySQL database server (avec Docker ou MAMP mais il faut reconfigurer le .env):

```
docker run --name sentiersCulturels-mysql -e MYSQL_USER=laravel -e MYSQL_PASSWORD=laravel -e MYSQL_ALLOW_EMPTY_PASSWORD=true -e MYSQL_DATABASE=laravel -p 3306:3306 -d mysql:latest
```

6. Start Mailpit server (Docker ou pas)

```
docker run --name=sentiersCulturels-mailpit -p 8025:8025 -p 1025:1025 -d axllent/mailpit
```

7. `npm run dev` & `php artisan serve`

## Installer avec Make

1. make all
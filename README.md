# Setup environnement de développement

1. Copier `.env.exemple` en `.env`
2. `php artisan key:generate`
3. Start MySQL database

## Requirements

- Docker

### Base de données

``
docker run --name sentiersCulturels-mysql \
-e MYSQL_USER=laravel \
-e MYSQL_PASSWORD=laravel \
-e MYSQL_ALLOW_EMPTY_PASSWORD=true \
-e MYSQL_DATABASE=laravel \
-p 3306:3306 -d mysql:latest
``

### Serveur de mails

```
docker run --name=sentiersCulturels-mailpit \
-p 8025:8025 \
-p 1025:1025 -d \
axllent/mailpit
```
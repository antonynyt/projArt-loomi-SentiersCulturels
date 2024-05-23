# Setup environnement de développement

## Requirements

- Docker

### Base de données

``
docker run --name laravel-mysql \
-e MYSQL_USER=laravel \
-e MYSQL_DATABASE=laravel \
-p 3306:3306 -d mysql:latest
``

### Serveur de mails
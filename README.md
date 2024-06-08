# Setup environnement de développement
## Requirements

- php ^8.2 & Composer
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

5. `php artisan migrate`
6. `php artisan db:seed`
7. `php artisan key:generate`
8. `php artisan storage:link`
9. Start Mailpit server (Docker ou pas)

```
docker run --name=sentiersCulturels-mailpit -p 8025:8025 -p 1025:1025 -d axllent/mailpit
```

10. `npm run dev` & `php artisan serve`

## Installer avec Make (si make est installé)

1. make all

# Déploiement

1. git clone
2. copier .env.prod en .env
3. Adapter les variables pour la DB et Mail
4. `composer install` & `npm install` (envoyer le build local si pas node sur le serveur)
5. `php artisan migrate`
6. `php artisan db:seed`
7. `php artisan key:generate`
8. `php artisan storage:link`
9. Le point d'entrée Apache doit être le dossier public

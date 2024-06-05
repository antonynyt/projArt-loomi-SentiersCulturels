# Targets
.PHONY: all install copy-env start-mysql start-mailpit init-migrations start

all: install copy-env start-mysql start-mailpit init-migrations start

install:
	@echo "Running composer install and npm install..."
	composer install
	npm install

copy-env:
	@echo "Copying .env.example to .env..."
	cp .env.example .env

generate-key:
	@echo "Generating application key..."
	php artisan key:generate

start-mysql:
	@echo "Starting MySQL database server with Docker..."
	docker run --name sentiersCulturels-mysql \
		-e MYSQL_USER=laravel \
		-e MYSQL_PASSWORD=laravel \
		-e MYSQL_ALLOW_EMPTY_PASSWORD=true \
		-e MYSQL_DATABASE=laravel \
		-p 3306:3306 -d mysql:latest

start-mailpit:
	@echo "Starting Mailpit server with Docker..."
	docker run --name=sentiersCulturels-mailpit \
		-p 8025:8025 \
		-p 1025:1025 -d \
		axllent/mailpit

init-migrations:
	@echo "Generating application key..."
	php artisan migrate
	php artisan db:seed
	php artisan key:generate
	php artisan storage:link

start:
	@echo "Starting development servers..."
	npm run dev &
	php artisan serve

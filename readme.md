## Docker Laravel

This Is Laravel Docker Boilerplate, And have Multi Authentication

## List of Images

-   **nginx:alpine** -
-   **mysql** -
-   **php:7.4.21-fpm** -
-   **phpmyadmin/phpmyadmin** -

## Usage

get started, make sure you have <a href="https://www.docker.com/products/docker-desktop">Docker installed</a> on your system.

Run command in the project directory for create docker containers.

    `docker-compose up -d=true`

You can run for remove docker container:

    `docker-compose down -v`

Their exposed ports detailed:

-   **nginx** - `:8080`
-   **mysql** - `:3306`
-   **php** - `:9000`
-   **phpmyadmin** - `:8081`

### Visit

You can visit <a href="http://localhost:8080/">http://localhost:8080/</a> in the url

### Container Access by shell command.

    `docker-compose exec app`

### Migrate And Seed

    `docker-compose exec app php artisan migrate --seed`

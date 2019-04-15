# Laradev - simple development environment for Docker

## usage

```bash
git clone git@github.com:MatakiTanaka09/docker_laravel_template.git
cd laradock/
cp env-example .env
docker-compose down
docker-compose up -d
cd ../src
cp .env.example .env
docker exec -it sample_php-worker_1 sh
/var/www # composer install
/var/www # php artisan key:generate
open http://localhost:8888

# RestAPIsample
handson sample for restAPI app with Nuxt and Laravel

## Preparing frontend(Nuxt.js)
$ docker-compose build --no-cache<br>
$ docker-compose up -d<br>
$ docker-compose exec frontend ash<br>
/app # create-nuxt-app ./<br>

## Preparing backend(Laravel)
go to directory /laravel<br>
$ bash start.sh<br>
$ bash container-login.sh<br>
(choose workspace)<br>
/var/www # composer require ramsey/uuid<br>

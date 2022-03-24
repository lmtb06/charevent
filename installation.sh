#!/bin/bash

# Copie du code github
printf '\n--Clonage du code github--\n\n'
git clone git@github.com:lmtb06/charevent.git

# On se met dans le dossier des fichiers sources
cd "charevent/src"

# On installe l'environnement laravel via une petite image docker
printf "\n--Installation de l'environnement laravel--\n\n"
docker run --rm -u "$(id -u):$(id -g)" -v $(pwd):/var/www/html -w /var/www/html laravelsail/php81-composer:latest composer install --ignore-platform-reqs


printf "\n--Création du fichier .env--\n\n"
cp ".env.example" ".env"

printf "\n--Lancement de sail--\n\n"
./vendor/bin/sail up -d
./vendor/bin/sail artisan sail:install --with="mysql,redis,meilisearch,mailhog,selenium"

printf "\n--Géneration de la clé laravel--\n\n"
./vendor/bin/sail artisan key:generate

printf "\n--Installation des dépendances npm--\n\n"
./vendor/bin/sail npm install
./vendor/bin/sail npm audit fix

./vendor/bin/sail down -v
./vendor/bin/sail up -d

# printf "\n--Migrations BDD--\n\n"
# ./vendor/bin/sail artisan migrate:fresh

# On crée un alias pour se faciliter la vie
alias sail="./vendor/bin/sail"
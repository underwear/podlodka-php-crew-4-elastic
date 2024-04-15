FROM php:latest

RUN apt-get update && apt-get install -y curl zip

COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer
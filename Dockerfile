FROM php:7.3.29-apache

COPY index.php index.php
COPY actions/ actions
COPY css/ css
COPY img/ img
COPY js/ js
COPY scss/ scss
COPY vendor/ vendor
COPY db.sqlite3 db.sqlite3
COPY editModals.php editModals.php
COPY tableRows.php tableRows.php

RUN a2enmod rewrite
RUN chmod 777 db.sqlite3

RUN docker-php-ext-install session

EXPOSE 80
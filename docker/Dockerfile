FROM php:7.3.13-cli-alpine

## Install of git needed for composer load from github
RUN apk update && apk upgrade && \
    apk add --no-cache bash git openssh

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer --version=1.9.3

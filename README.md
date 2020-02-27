# README

## Overview

Purpose of this project is replicate error on prophesize an `ExceptionInterface` that implements `\Throwable`

Used software:

- phpunit/phpunit: 7.5.0
- symfony/http-client-contracts: 2.0.1

## Quickstart with Docker composer image

```bash
docker run -it --rm -v "$PWD":/usr/src/myapp -w /usr/src/myapp composer install
docker run -it --rm -v "$PWD":/usr/src/myapp -w /usr/src/myapp composer vendor/phpunit/phpunit/phpunit tests/Service/ClientTest.php
```

## Quickstart with Docker custom image

Build Docker image

```bash
docker build -t php-7.3.13-with-composer - < docker/Dockerfile
```

Install dependencies

```bash
docker run -it --rm -v "$PWD":/usr/src/myapp -w /usr/src/myapp php-7.3.13-with-composer composer install
```

Run tests

```bash
docker run -it --rm -v "$PWD":/usr/src/myapp -w /usr/src/myapp php-7.3.13-with-composer vendor/phpunit/phpunit/phpunit --bootstrap vendor/autoload.php tests/Service/ClientTest.php
```

# Interview assignment

> for websupport 2020

## Requirements

```
php 7.4
ext-curl
```

> Application might work with lower PHP version, but I used php7.4 during development

## Installation

```
git clone git@github.com:pipan/websupport-2020.git
cd websupport-2020
composer dump-autoload
cp src/App/Config/env.example.php src/App/Config/env.php
```

1. create virtual host
   1. set directory path to `public` folder
2. add record for your local domain into `/etc/hosts`

## Configuration

You can configure your application with `src/App/Config/env.php` file.

### Websupport API config

* **user** - user ID or `self`
* **domain** - domain, for which you want to manage DNS records
* **key** - API key identification
* **secret** - API key secret
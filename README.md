# ece-piscine
An eCommerce Web Platform written in HTML5, CSS, javascript and PHP using Laravel Framework.
[http://ece-piscine.herokuapp.com/](http://ece-piscine.herokuapp.com/)

## Installation
To quickly install Composer in the current directory, run the following script in your terminal.
``` bash
php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
php -r "if (hash_file('sha384', 'composer-setup.php') === '48e3236262b34d30969dca3c37281b3b4bbe3221bda826ac6a9a62d6444cdb0dcd0615698a5cbe587c3f0fe57a54d8f5') { echo 'Installer verified';  } else { echo 'Installer corrupt'; unlink('composer-setup.php');  } echo PHP_EOL;"
php composer-setup.php
php -r "unlink('composer-setup.php');"
```

After running the installer you can run this to move composer.phar to a directory that is in your path:
``` bash
mv composer.phar /usr/local/bin/composer
```

Now, download the Laravel installer using Composer:
``` bash
composer global require laravel/installer
```
Clone this repo and change to the directory.

## Usage
Run:
``` bash
php artisan serve
```

And
``` bash
php artisan migrate --seed
```

Go to [http://localhost:8000](http://localhost:8000) and voilà!

## References
- [Laravel Documentation](https://laravel.com/docs/5.8)
- [Laracasts](https://laracasts.com/series/laravel-from-scratch-2018/)
- [Stackoverflow](https://stackoverflow.com/)
- [Heroku Documentation](https://devcenter.heroku.com/)
- [MySQL Workbench Manual](https://dev.mysql.com/doc/workbench/en/)
- [Spatie Laravel-Permission](https://github.com/spatie/laravel-permission)
- [User Authorization in Laravel 5.4 with Spatie Laravel-Permission](https://scotch.io/tutorials/user-authorization-in-laravel-54-with-spatie-laravel-permission)
- [LaravelShoppingcart by bumbummen99](https://github.com/bumbummen99/LaravelShoppingcart)
- [Algolia Documentation](https://www.algolia.com/doc)
- [Stripe Documentation](https://stripe.com/docs)
- [Stripe Laravel](https://github.com/cartalyst/stripe-laravel)

## Credentials and credit card information
This information is for testing purposes.

admin@example.com
admin123

seller@example.com
seller123

user@example.com
user123
4000002500000003
123
12/21

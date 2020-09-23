# My Test

[README em Português](README-PT-BR.md)

CRUD created as requested in the test.

* Registration system
* Log in
* User administration
* Avatar upload 
* Support of English and Brazilian Portuguese languages

## Getting Started

To use the project you need to download or clone it (via SSH or HTTPS), and place it on a environment that allows the use of the PHP language ([XAMPP](https://www.apachefriends.org/pt_br/index.html), [WAMP](https://bitnami.com/stack/wamp), [LAMP](https://bitnami.com/stack/lamp), [Laravel Homestead](https://laravel.com/docs/7.x/homestead), [Laradock](https://laradock.io/), etc.).

```sh
$ git clone git@github.com:tanukesensei/prodigious-test.git # SSH
$ git clone https://github.com/tanukesensei/prodigious-test.git # HTTPS
```

To run the project you will need to install [Composer](https://getcomposer.org/download/) and [MySQL](https://dev.mysql.com/). All the environments mentioned above already have MySQL, however, only Laravel Homestead and Laradock have Composer.

After installation, create the database with the name you prefer. After creating the database, access the project folder, you will see a file called `.env.example`, it is in the project's root folder.
You must copy it to a file called `.env`, then you need to open the terminal, access the project folder and use the following command to generate the application key.

```php
$ php artisan key:generate
```
After entering the command, open the `.env` file and check if the `APP_KEY` field has a generated key, if not, run the previous command again.

Still in `.env` look for the code block below:

```ini
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=
DB_USERNAME=
DB_PASSWORD=
```

By default Laravel is configured to use MySQL, inform in the fields `DB_DATABASE`,` DB_USERNAME` and `DB_PASSWORD`, the name of the database, the database user and the user password, respectively. Save and close the file.

After that, in your terminal at the project location, execute the commands:

```php
$ php artisan migrate
``` 

Then:

```php
$ php artisan db:seed
``` 

The first command will create the tables in the database, while the second will populate them. Then run:

```php
$ php artisan serve
``` 

This will start the project server and show the URL.

After all the steps done, the project can be accessed. As it is a test, the Administrator's credentials are login `admin@admin.com` and password `123456789`.

## Stack

* [Laravel](https://laravel.com/) 7.24
* [PHP](https://www.php.net/) 7.2
* [MySQL](https://dev.mysql.com/) 14.14
* [Bootstrap](https://getbootstrap.com/) 4.3 

## Acknowledgment

I am grateful to [Lucas](https://github.com/lucascudo/laravel-pt-BR-localization) for the translation of the error fields provided in his GitHub repository.

## License

My Test is a free software project licensed by [MIT](LICENSE).

## Laravel Pastebin

[Laravel Pastebin](http://paste.laravel.com/).

## Setting up a local development environment

### Create sqlite database

 * `touch app/database/local.sqlite`

### Create local database config

 * `mkdir app/config/local`
 * `cp app/config/database.php app/config/local/database.php`
 * Edit sql database line to be `'database' => __DIR__.'/../../database/local.sqlite',`

### Migrate

  * `php artisan --env=local migrate`
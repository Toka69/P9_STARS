## About this application

This is my very first Laravel project.

This is an application for viewing star profiles.
We find all the features of a classic CRUD.
A backoffice allows you to add, edit and delete records.
Finally, all users with an account can list and modify the profiles, however only the creator of the profile can delete it.

The stack is Laravel 9 + PHP 8.2 + Blade + Tailwind + Jquery

### Installation

For install the app on your desktop in dev environment, Docker and docker-compose are necessary.

To execute the docker stack
```
composer install
./vendor/bin/sail up
```

Two containers are created. One for the web app and another for the SQL database.

Enter the web container :
```
docker exec -ti <name_of_your_web_container> bash
```
and execute
```
npm run dev
```

You can configure the dotenv file by copying the ".env.example" to ".env". For example the host port is 90, so you can access on localhost:90

Then generate your key app:
```
php artisan key:generate
```
and link the storage folder:
```
php artisan storage:link
```

Execute the migrations:
```
php artisan migrate
```

### Execute the QA:
PHPSTAN :
```
./vendor/bin/phpstan analyse
```

PHP-CS-FIXER (For PHP8.2 use the "ignore environment"):
```
PHP_CS_FIXER_IGNORE_ENV=1 vendor/bin/php-cs-fixer fix ./app
```

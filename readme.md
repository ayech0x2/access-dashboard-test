* **I'm using Laravel 5.8**
* **PHP >= 7.1.3**

Please make sure to follow these instructions:

* `npm install`

* `composer install`

- If you are using **_phpstorm_** install .env files support plugin and create a **_.env_** file
- Copy the **_.env_**  file content from **_.env.example_** file 
 and edit these fields:
* `DB_CONNECTION=mysql`

* `DB_HOST=127.0.0.1`

* `DB_PORT=3306`

* `DB_DATABASE=homestead`

* `DB_USERNAME=homestead`

* `DB_PASSWORD=secret`

- dont forget to create the **_database_** ex: access
* `php artisan:migrate`

* `php artisan db:seed —class=UserTableSeeder`

* `php artisan db:seed —class=VisitsTableSeeder`

* `php artisan key generate`

* `php artisan serve`

- click on register and create a new account 
- there you go !

**if something is wrong please try to use:**
* `composer dump-autoload`


# Simple Task Manager

This is a simple task manager based on the Laravel framework.

## Installation

These steps have been tested on Ubuntu, your milage may vary.

1. Clone this repository `git clone https://github.com/Sam-R/task-manager.git` and cd into it `cd task-manager`
2. use `composer install` to get the dependencies of the project
3. Setup the .env file `mv .env.example .env` and generate the application key `php artisan key:generate`
4. setup MySQL details using `config/database.php` or `.env`. Note if using the database.php file, the database connection stanza will have to be removed from .env.
4. Run the migrations on your database `php artisan migrate`
5. Now, the solution needs data to be seeded in the database, do this using `php artisan db:seed`
6. Now run the solution so you can access it in a web browser, the easiest way to do this is `php artisan serve`
7. visit `http://localhost:8000/` in a web browser

## License

This software is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).

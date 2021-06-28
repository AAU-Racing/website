# AAU-Racing new Website
## Development enviroment
### Prerequisites
- Have a database of your choice installed.
    - MySQL, MariaDB, PostgreSQL, SQLite etc.
- Have composer installed.
- If you choose MySQL, it might be necessary on debian based distros to run `sudo apt install php-mysql`.
### Setup Guide
1. Clone the repository.
2. Copy the .env.example and change the copy to .env and input your database info. 
3. Run `composer install` in the root directory.
4. Run database migrations `php artisan migrate`.
5. Run the seed command `php artisan db:seed --class={class name}`. To run all seeders `php artisan db:seed`.
6. Create user at `http://localhost/register`.
7. Validate user using the validation link found in the logfile in /storage/log. 
8. Run the `php artisan register:website-admin` command.

### Clean database
Run the command `php artisan migrate:fresh --seed`.

### Notes
Please make sure no API keys and similar gets pushed to the repository.

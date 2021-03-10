# AAU-Racing new Website
## Development enviroment
### Prerequisites
- Have a database of your choice installed.
    - MySQL, MariaDB, SQLite etc.
- Have composer installed.
- If MySQL is chosen it might be necessary on debian based distros to run `sudo apt install php-mysql`.
### Setup Guide
1. Clone the repository.
2. Copy the .env.example and change the copy to .env and input your database info. 
3. Run `composer install` in the root directory.
4. Run database migrations `php artisan make:migration {migrationname}`.
5. Run the seed command `php artisan make:seeder {seedname}`.
6. Run the command `php artisan migrate:fresh --seed`.
7. Create a user there will be a validation link in the logfile found in /storage/log. User creation is done on /register in the browser.
8. Run the `php artisan register:website-admin` command. 

### Notes

1. Please make sure no Api keys etc. gets pushed to the repository.
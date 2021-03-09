# website

## Setup Guide

1. Clone the repository 
2. Run `composer install` in the root directory
3. Run database migrations `php artisan make:migration {migrationname}`
4. Run the seed command `php artisan make:seeder {seedname}`
5. Create a user there will be a validation link in the logfile. User creation is done on /register in the browser.
6. Run the `make website admin` command 
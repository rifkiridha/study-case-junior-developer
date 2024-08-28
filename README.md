# Laravel Project Setup

## Database Configuration

1. Open the `.env` file in the root directory of your project.
2. Update the database configuration settings as follows:

   DB_CONNECTION=pgsql
   DB_HOST=127.0.0.1
   DB_PORT=5432
   DB_DATABASE=test_bank_dki
   DB_USERNAME=postgres
   DB_PASSWORD=postgres


3. Adjust the `DB_HOST` and `DB_PORT` settings according to your server's configuration.

4. Create a new database with the name specified in `DB_DATABASE` (`test_bank_dki`).

## Run Migrations and Seeders

Run the following commands in your terminal:

php artisan migrate
php artisan db:seed


## Start the Server

To start the Laravel development server, use:

php artisan serve

## Accessing the Front-End

To view the front-end, open the following URL in your browser:

[http://localhost:8000/frontend/index.html](http://localhost:8000/frontend/index.html)

## API Reference

The Postman collection for the API can be found in the file "API Test Bank DKI - Rifki Ridha.postman_collection.json."

---

**Candidate: Rifki Ridha**


Let me know if you need any further adjustments!
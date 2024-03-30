# installation Guide: 
1. Download the zip and extract it
2. Open your terminal or command prompt inside the project folder
3. Run " composer install " to install PHP dependencies
4. run "php artisan key:generate " to generate an application key
5. Duplicate the .env.example file and rename it to .env.
6. Open the .env file and set your database connection details
7. Open the .env file and set your database connection details as:
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=your_database_name
    DB_USERNAME=your_database_username
    DB_PASSWORD=your_database_password
8. run " php artisan migrate "
9. run " php artisan serve " to run the project


# API Tessting guide:

To test the API endpoints using Postman, you can use the following URLs and parameters:

1. **Mock API Endpoint**:
   - URL: `POST http://localhost:8000/api/mock`
   - Parameters: This endpoint does not require any parameters. However, you need to set the `X-Mock-Status` header to simulate different responses.
     - Headers:
       - `X-Mock-Status`: Set this header to either `accepted` or `failed` to simulate successful or failed responses, respectively.

2. **Transaction API Endpoint**:
   - URL: `POST http://localhost:8000/api/doTransaction`
   - Parameters: 
     - `user_id`: The ID of the user making the transaction (required).
     - `amount`: The amount of the transaction (required).
   - Headers:
     - No additional headers are required.

3. **Callback API Endpoint**:
   - URL: `PATCH http://localhost:8000/api/updateTransaction/{transaction_id}`
     - Replace `{transaction_id}` with the ID of the transaction you want to update.
   - Parameters: 
     - `status`: The new status of the transaction (required). This parameter should be passed in the request body.
   - Headers:
     - No additional headers are required.

Make sure your Laravel application is running locally on `http://localhost:8000` or adjust the URL accordingly if you are using a different port or domain.


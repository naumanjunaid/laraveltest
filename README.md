# Laravel Submission Appliation

## Environment

-   copy `.env.example` to `.env` file, run `cp .env.expample .env`
-   change the following as per system

```
DB_DATABASE=test
DB_USERNAME=
DB_PASSWORD=
```

## Local Server

-   run `php artisan serve` to have a local working application

## Data Submission

-   Use any client to test the application e.g; `POSTMAN` etc
-   post data to end url '/submit'

```
{
      "name": "John Doe",
      "email": "john.doe@example.com",
      "message": "This is a test message."
 }
```

## DATABASE

-   CREATE DATABASE `test` DEFAULT CHARACTER SET = 'utf8mb4';
-   For queues `php artisan queue:table`
-   Run migrations `php artisan migrate`

## JOBS

-   run `php artisan queue:work` to manage queues
-   change `QUEUE_CONNECTION=database` in `.env` file

## Testing

-   run `php artisan test` to run all existing tests
-   run `php artisan test --filter SubmissionTest` to run submission specific test

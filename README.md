# Ampeco assignment

Create application displaying bitcoin price change in USD.
- Data should be fetched from external API - Bitfinex
- Data should be displayed with Chart.js library
- User should be able to subscribe for price change
- User should be notified by email if price went above his subscription

## Setup

### Install backend dependencies

`composer install`

### Run containers

`docker compose up -d`

### Set up environment variables

Copy .env.example file with name .env (no sesitive keys included)

### Generete APP_KEY

`docker exec ampeco-laravel.test-1 php artisan key:generate`

### Execute migrations and seed database

`docker exec ampeco-laravel.test-1 php artisan migrate --seed`

### Install frontend dependencies

`docker exec ampeco-laravel.test-1 npm install`

### Compile assets

`docker exec ampeco-laravel.test-1 npm run build`

## Usage

Initial approach is using blade templates
Version can be reached on: http://localhost/

Second approach is using Vue.js
Version can be reached on: http://localhost/vue

### Run both commands in separate tabs to start collecting data:
- `docker exec ampeco-laravel.test-1 php artisan schedule:work` - schedule queued jobs - configured to run each minute
- `docker exec ampeco-laravel.test-1 php artisan queue:work` - start worker that scans the queue (database) - executes found jobs.

## Run tests

`docker exec ampeco-laravel.test-1 php artisan test`
# RESTful API for products by weather forecast using Laravel Framework
A service that gives recommendations on products based on the weather forecast in the selected city of Lithuania.

<h2>Challenge description</h2>
Create a service, which returns product recommendations depending on the weather forecast.

<h2>Used Technologies</h2>
- PHP 8.0 <br>
- Laravel Framework 9.0 <br>
- MySQL RDBMS <br>
- LHMT API - Meteorological data API (source: https://api.meteo.lt/) 

<h2>Setup Guide</h2>

- Clone the repository
```
git clone https://github.com/iljadedeiko/laravel-products-by-weather-forecast.git
```
- Open the cloned project directory
```
cd ~/laravel-products-by-weather-forecast
```
- Run the following command to launch the application (Note that PHP must be installed on your system)
```
php artisan serve
```
- Install composer dependencies
```
composer install
```
- Install NPM Dependencies
```
npm install
```
- Create a copy of your .env file
```
cp .env.example .env
```
- Generate an app encryption key
```
php artisan key:generate
```
- Create an empty database for our application
- In the .env file, add database information to allow Laravel to connect to the database
```
In the .env file fill in the DB_HOST, DB_PORT, DB_DATABASE, DB_USERNAME,
and DB_PASSWORD options to match the credentials of the database you just created. 
```
- Migrate the database
```
php artisan migrate
```
- Seed the database
```
php artisan db:seed
```

<h2>Usage Example</h2>
The API is accessed by the following request: <br>
http://127.0.0.1:8000/api/v1/products/recommended/vilnius
(This request will return data in the city of Vilnius)

Example of a JSON response:
```json
{
   "weather_data_source":"https:\/\/api.meteo.lt\/",
   "city":"vilnius",
   "recommendations":[
      {
         "weather_forecast":"clear",
         "date":"2022-02-15",
         "products":{
            "1":{
               "sku":"TLP-25",
               "name":"Lime Voluptas",
               "price":5.2
            },
            "3":{
               "sku":"SXW-50",
               "name":"Lavender Aut",
               "price":26.34
            }
         }
      },
      ...
```

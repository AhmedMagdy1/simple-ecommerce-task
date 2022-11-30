## Products & tags & Categories Task

## Installation
- clone the repo
```
$ git clone https://github.com/AhmedMagdy1/simple-ecommerce-task
```
- move to the project directory
```
$ cd simple-ecommerce-task
```
- copy environment variables file
```
$ cp .env.example .env
```

- add database credentials in .env file 
    - DB_DATABASE=laravel
    - DB_USERNAME=user
    - DB_PASSWORD=password


- install required packages
```
$ composer install && php artisan key:generate && npm install
```

- to run migrations, and fake data for all tables 
```
$ php artisan migrate --seed
```
to run the server
 ```
 $ php artisan serve
 ```
(base url is : http://localhost:8000)

you can create new user using register 

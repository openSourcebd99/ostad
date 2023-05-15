# Part 1

# Laravel Installation with Sample Hello World Project

## First Step

Installing Composer via brew <br/>
<img width="562" alt="1)Composer_install" src="https://github.com/openSourcebd99/ostad/assets/125869281/008c4b01-158c-4d69-bc07-f8d762721386">

## Second Step

Creating project with composer
<br/>

```php
composer create-project laravel/laravel hello_world
```

<br/>
<img width="896" alt="2)Project_setup" src="https://github.com/openSourcebd99/ostad/assets/125869281/0ba651d3-9495-41ba-b56d-07339a9f9cfc">

## Third Step

Go to Project directory and Run Server <br/>

```php
php artisan serve
```

<img width="1058" alt="3)running_server" src="https://github.com/openSourcebd99/ostad/assets/125869281/3fc53f9b-d432-4fec-88a6-fd5330bc15d0">

## Final Step

Go to routes directory and in web.php file and add route <br />

```php
Route::get('/hello', function () {
  return "Hello, World!";
});
```

<img width="1334" alt="4)hello_world_route" src="https://github.com/openSourcebd99/ostad/assets/125869281/68290c64-15ba-4d5f-8abc-5382f9fef050">

# Part 2 (Directory Description)

[Directory Description Link](https://github.com/openSourcebd99/ostad/blob/main/assignment_13/directory_discription.md)

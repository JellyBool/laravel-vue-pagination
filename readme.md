## Demo:

![](https://wt-prj.oss.aliyuncs.com/0d06af79c49d4e08abb1ab3f7ab6e860/ca791fed-8e49-4b7e-93ce-1c8d133dc167.gif)

## Usage:

> Notice: for the js code, just look into welcome.blade.php 
> and the data format locates in routes.php

### 1.Clone the Repo

```
git clone https://github.com/JellyBool/laravel-vue-pagination.git

cd laravel-vue-pagination

composer install

```

### 2.Setup Database

edit your .env file and setup database for laravel

### 3.Seed some data

in your project root (`laravel-vue-pagination/`):

```
php artisan migrate

php artisan tinker
```
then 
```
factory(App\Post::class,35)->create()
```

### 4.See the demo
run a local serve and see the demo :
```
php artisan serve
```
visit localhost:8000 and you are good to go 

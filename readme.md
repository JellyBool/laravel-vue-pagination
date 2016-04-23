Usage:

### 1.Clone the Repo

```
git clone https://github.com/JellyBool/laravel-vue-pagination.git

cd laravel-vue-pagination
```

### 2.Setup Database

edit your .env file and setup database for laravel

### 3.Seed some data

in your project root (`laravel-vue-pagination/`):

```
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

<?php


Route::get('/', function () {
    return view('welcome');
});

Route::get('/items', function () {
    $items =  \App\Post::latest()->get(['id','title','body']);
    
    return $items;
});

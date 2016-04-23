<?php


Route::get('/', function () {
    return view('welcome');
});

Route::get('/api/items', function () {
    $results =  \App\Post::latest()->paginate(7);

    $response = [
        'pagination' => [
            'total' => $results->total(),
            'per_page' => $results->perPage(),
            'current_page' => $results->currentPage(),
            'last_page' => $results->lastPage(),
            'from' => $results->firstItem(),
            'to' => $results->lastItem()
        ],
        'data' => $results
    ];
    
    return $response;
});

Route::get('/item/{id}', function ($id) {
   return \App\Post::find($id);
});

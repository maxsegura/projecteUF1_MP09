<?php
// definim les rutes
return [
    // Ruta a la landing page
    '/' => 'App/Controllers/LandingController@index',

    // Rutas per a les pelis
    '/films' => 'App/Controllers/FilmController@index',
    '/films/create' => 'App/Controllers/FilmController@create',
    '/films/store' => 'App/Controllers/FilmController@store',
    '/films/show' => 'App/Controllers/FilmController@show',
    '/films/edit' => 'App/Controllers/FilmController@edit',
    '/films/update' => 'App/Controllers/FilmController@update',
    '/films/delete' => 'App/Controllers/FilmController@delete',
    '/films/destroy' => 'App/Controllers/FilmController@destroy',

    // Rutas per a llibres
    '/books' => 'App/Controllers/BookController@index',
    '/books/create' => 'App/Controllers/BookController@create',
    '/books/store' => 'App/Controllers/BookController@store',
    '/books/show' => 'App/Controllers/BookController@show',
    '/books/edit' => 'App/Controllers/BookController@edit',
    '/books/update' => 'App/Controllers/BookController@update',
    '/books/delete' => 'App/Controllers/BookController@delete',
    '/books/destroy' => 'App/Controllers/BookController@destroy',
];


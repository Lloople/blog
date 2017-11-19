<?php

Route::get('/', 'HomeController@index')->name('homepage');

Route::get('/posts/{slug}', 'PostsController@show')->name('posts.show');

Route::get('/categories', 'CategoriesController@index')->name('categories.index');
Route::get('/categories/{$slug}', 'CategoriesController@show')->name('categories.show');
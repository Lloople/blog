<?php

Route::get('/', 'PostsController@index')->name('posts.index');

Route::get('/posts/{slug}', 'PostsController@show')->name('posts.show');

Route::get('/categories', 'CategoriesController@index')->name('categories.index');

Route::get('/categories/{slug}', 'CategoriesController@show')->name('categories.show');

Route::get('/tags', 'TagsController@index')->name('tags.index');

Route::get('/tags/{slug}', 'TagsController@show')->name('tags.show');

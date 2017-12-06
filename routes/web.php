<?php

Route::get('/', 'PostsController@index')->name('posts.index');

Route::get('/posts/{slug}', 'PostsController@show')->name('posts.show');

Route::get('/categories', 'CategoriesController@index')->name('categories.index');

Route::get('/categories/{slug}', 'CategoriesController@show')->name('categories.show');

Route::get('/tags', 'TagsController@index')->name('tags.index');

Route::get('/tags/{slug}', 'TagsController@show')->name('tags.show');

Auth::routes();

Route::group(['prefix' => 'backend', 'middleware' => 'auth', 'as' => 'backend.'], function () {

    Route::redirect('', 'backend/posts');
    Route::view('posts', 'backend.posts.index');
});


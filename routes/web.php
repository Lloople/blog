<?php

Route::get('/', 'PostsController@index')->name('posts.index');

Route::get('/posts/{slug}', 'PostsController@show')->name('posts.show');

Route::get('/categories', 'CategoriesController@index')->name('categories.index');

Route::get('/categories/{slug}', 'CategoriesController@show')->name('categories.show');

Route::get('/tags', 'TagsController@index')->name('tags.index');

Route::get('/tags/{slug}', 'TagsController@show')->name('tags.show');

Route::get('/about-me', 'AboutMeController@show')->name('about-me.show');

Auth::routes();

Route::group(['prefix' => 'backend', 'middleware' => 'auth', 'as' => 'backend.'], function () {
    Route::redirect('', 'backend/posts');

    Route::resource('posts', 'Backend\PostsController', ['except' => 'show']);
    Route::resource('categories', 'Backend\CategoriesController', ['except' => 'show']);
    Route::resource('tags', 'Backend\TagsController', ['only' => ['index', 'destroy']]);
    Route::resource('themes', 'Backend\ThemesController', ['except' => ['show']]);

    Route::group(['prefix' => 'resources', 'middleware' => 'auth', 'as' => 'resources.'], function () {
        Route::get('posts', 'Backend\PostsController@resource');
        Route::get('categories', 'Backend\CategoriesController@resource');
        Route::get('tags', 'Backend\TagsController@resource');
        Route::get('themes', 'Backend\ThemesController@resource');
    });
});

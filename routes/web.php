<?php

use Illuminate\Support\Facades\Route;

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::group(['namespace' => 'Pages'], function () {
    Route::get('/about', 'About')->name('pages.about');
    Route::get('/projects', function () {
        return response()->json(['message' => 'coming soon!']);
    })->name('pages.projects');
});

Route::group(['namespace' => 'Posts'], function () {
    Route::get('/{tag?}', 'Index')->name('posts.index');
    Route::get('/posts/{post:slug}', 'Show')->name('posts.show');
});


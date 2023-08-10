<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', 'PagesController@index')->name('index');

Route::get('/books', 'BooksController@index')->name('books.index');
Route::get('/books/single-book', 'BooksController@show')->name('books.show');


Route::get('/books/categories/{slug}', 'CategoryController@show')->name('categories.show');


Route::group(['prefix' => 'admin'],function(){
    Route::get('/','Backend\BooksController@index')->name('admin.index');

    //Book Control Route

    Route::group(['prefix' => 'books'],function(){
        Route::get('/','Backend\BooksController@index')->name('admin.books.index');
        Route::get('/{id}','Backend\BooksController@show')->name('admin.books.show')->where('id', '[0-9]+');
        Route::get('/create','Backend\BooksController@create')->name('admin.books.create');
        Route::get('/edit/{id}','Backend\BooksController@edit')->name('admin.books.edit');
        Route::post('/update/{id}','Backend\BooksController@update')->name('admin.books.update');
        Route::post('/store','Backend\BooksController@store')->name('admin.books.store');
    });

    // Author Control Route

    Route::group(['prefix' => 'authors'],function(){
        Route::get('/','Backend\AuthorsController@index')->name('admin.authors.index');
        Route::post('/store','Backend\AuthorsController@store')->name('admin.authors.store');
        Route::get('/{id}','Backend\AuthorsController@show')->name('admin.authors.show');
        Route::post('/update/{id}','Backend\AuthorsController@update')->name('admin.authors.update');
        Route::post('/delete/{id}','Backend\AuthorsController@destroy')->name('admin.authors.delete');
    });


    // Category Control Route

    Route::group(['prefix' => 'categories'],function(){
        Route::get('/','Backend\CategoryController@index')->name('admin.categories.index');
        Route::post('/store','Backend\CategoryController@store')->name('admin.categories.store');
        Route::get('/{id}','Backend\CategoryController@show')->name('admin.categories.show');
        Route::post('/update/{id}','Backend\CategoryController@update')->name('admin.categories.update');
        Route::post('/delete/{id}','Backend\CategoryController@destroy')->name('admin.categories.delete');
    });


    // Publisher Control Route

    Route::group(['prefix' => 'publishers'],function(){
        Route::get('/','Backend\PublisherController@index')->name('admin.publishers.index');
        Route::post('/store','Backend\PublisherController@store')->name('admin.publishers.store');
        Route::get('/{id}','Backend\PublisherController@show')->name('admin.publishers.show');
        Route::post('/update/{id}','Backend\PublisherController@update')->name('admin.publishers.update');
        Route::post('/delete/{id}','Backend\PublisherController@destroy')->name('admin.publishers.delete');
    });


});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

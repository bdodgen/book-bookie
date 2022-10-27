<?php

use App\Http\Controllers\Admin;
use App\Http\Controllers\Admin\BookController as AdminBookController;
use App\Http\Controllers\Api\TestController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\Api\BookController as ApiBookController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IndexController;
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

Route::get('/', [ IndexController::class, 'index'])->name('index.index');

Route::get('/about-us', [ AboutController::class, 'about'])->name('about.about');

Route::get('/api/test/array', [ TestController::class, 'arrayResponse'])->name('api.test-array');
Route::get('/api/test/book/{book_id}', [ TestController::class, 'book'])->name('api.test-book');
Route::get('/api/test/model', [ TestController::class, 'modelResponse'])->name('api.test-model');
Route::get('/api/test/collection', [ TestController::class, 'collectionResponse'])->name('api.test-collection');

Route::get('/home', [HomeController::class, 'home'])->middleware('auth')->name('home');

Route::get('/book/{book_id}', [BookController::class, 'show'])->whereNumber('book_id')->name('book.show');

Route::post('/book/{book_id}/review', [BookController::class, 'saveReview'])
    ->whereNumber('book_id')
    ->name('book.save-review');
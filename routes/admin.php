<?php

use App\Http\Controllers\Admin\AuthorController;
use App\Http\Controllers\Admin\UserController;
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

Route::get('/admin/authors', [ AuthorController::class, 'index'])->name('authors.index');
Route::post('/admin/authors', [ AuthorController::class, 'store'])->name('authors.index-store');
Route::get('/admin/authors/create', [ AuthorController::class, 'create'])->name('authors.create');

Route::group(['middleware' => 'can:admin'], function() {

    Route::get('/admin/books', [Admin\BookController::class, 'index'])->name('admin.books.index');
    Route::get('/admin/books/create', [Admin\BookController::class, 'create'])->name('admin.books.create');
    Route::get('/admin/books/{book_id}/delete', [Admin\BookController::class, 'delete'])->name('admin.books.delete');
    Route::get('/admin/users', [UserController::class, 'index'])->name('admin.users.index');
});
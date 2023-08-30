<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('homePage');
});

Route::get('/cadastrar-livro', function () {
    return view('books/registerBooksPage');
});

Route::get('/listar-livros', function () {
    return view('books/listBooksRegisteredPage');
});

Route::get('/cadastrar-autor', function () {
    return view('authors/registerAuthorsPage');
});

Route::get('/listar-autores', function () {
    return view('authors/listAuthorsRegisteredPage');
});



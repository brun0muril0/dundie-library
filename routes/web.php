<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthorController;

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

/*Rotas da tela Home */
Route::get('/', function () {
    return HomeController::viewAuthorsBooks();
});

/*Rotas das telas de Livros*/
Route::get('/cadastrar-livro', function () {
    return view('books/registerBooksPage');
});

Route::get('/listar-livros', function () {
    return view('books/listBooksRegisteredPage');
});

/*Rotas das telas de Autores */
Route::get('/cadastrar-autor', function () {
    return view('authors/registerAuthorsPage');
});

Route::get('/listar-autores', [AuthorController::class, 'viewAuthors']);
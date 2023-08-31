<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;

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
Route::get('/',[HomeController::class, 'viewAuthorsBooks']);

/*Rotas das telas de Livros*/
Route::get('/cadastrar-livro', [AuthorController::class, 'authorsToCreateBook']);
Route::get('/listar-livros', [BookController::class, 'viewBooks']);

/*Rotas das telas de Autores */
Route::get('/cadastrar-autor', function () {
    return view('authors/registerAuthorsPage');
});
Route::get('/listar-autores', [AuthorController::class, 'viewAuthors']);
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Http\Controllers\AuthorController;
use App\Utils\ApiLogger;

class BookController extends Controller
{   
    /* Função responsável por buscar todos os livros e retornar para view da lista de livros.
       Retorna também os autores para realizar a atualização do livro.
    */
    public function viewBooks() {
        try {
            $books = $this->index();

            $authors = AuthorController::index();

            // dd($authors);
            return view('books.listBooksRegisteredPage',[
                'books' => $books,
                'authors' => $authors
            ]);
        } catch (\Exception $e) {

            ApiLogger::exception(
                'BookController',
                'viewBooks',
                $e
            );

            return response("Erro: " . $e, 500);
        }
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $data = Book::with(['author'])
                        ->orderBy('id_book')->get();
    
            return $data;
        } catch (\Exception $e) {

            ApiLogger::exception(
                'BookController',
                'index',
                $e
            );

            return response("Erro ao obter lista de livros: " . $e, 500);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validateData = $request->validate([
                'title' => 'string',
                'id_author' => 'integer',
                'gender' => 'string',
                'synopsis' => 'string',
                'cover' => 'string',
                'publication_year' => 'integer'
            ]);
    
            Book::create($validateData);
    
            return response('Livro cadastrado com sucesso!', 200);
        } catch (\Exception $e) {

            ApiLogger::exception(
                'BookController',
                'store',
                $e
            );

            return response("Erro ao cadastrar o livro: " . $e, 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $validateData = $request->validate([
                'title' => 'string',
                'id_author' => 'integer',
                'gender' => 'string',
                'synopsis' => 'string',
                'cover' => 'string',
                'publication_year' => 'integer'
            ]);
    
            Book::where('id_book', $id)
                  ->update($validateData);
    
            return response('Livro atualizado com sucesso!', 200);
        } catch (\Exception $e) {

            ApiLogger::exception(
                'BookController',
                'update',
                $e
            );

            return response("Erro ao atualizar livro: " . $e, 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            Book::where('id_book', $id)
                ->delete();
    
            return response('Livro excluído com sucesso!', 200);
        } catch (\Exception $e) {

            ApiLogger::exception(
                'BookController',
                'destroy',
                $e
            );

            return response("Erro ao excluir o livro: " . $e, 500);
        }
    }
}

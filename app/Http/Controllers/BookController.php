<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{   
    /* Função responsável por buscar todos os livros e retornar para view da lista de livros*/
    public function viewBooks() {
        try {
            $books = $this->index();

            return view('books.listBooksRegisteredPage',[
                'books' => $books
            ]);
        } catch (\Exception $e) {
            $errorMessage = $e->getMessage();
            return response("Erro: " . $errorMessage, 500);
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
            $errorMessage = $e->getMessage();
            return response("Erro ao obter lista de livros: " . $errorMessage, 500);
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
            $errorMessage = $e->getMessage();
            return response("Erro ao cadastrar o livro: " . $errorMessage, 500);
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
        //
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
            $errorMessage = $e->getMessage();
            return response("Erro ao excluir o livro: " . $errorMessage, 500);
        }
    }
}

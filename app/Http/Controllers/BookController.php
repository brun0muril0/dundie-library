<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{   
    /* Função responsável por buscar todos os livros e retornar para view da lista de livros*/
    public function viewBooks() {
        $books = $this->index();

        return view('books.listBooksRegisteredPage',[
            'books' => $books
        ]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Book::with(['author'])
                    ->orderBy('id_book')->get();

        return $data;
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
        Book::where('id_book', $id)
            ->delete();

        return response('Livro excluído com sucesso!', 200);
    }
}

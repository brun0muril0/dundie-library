<?php

namespace App\Http\Controllers;

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use Illuminate\Http\Request;

class HomeController extends Controller
{   
    /*Função responsável por buscar livros, autores e retornar para view da home.*/
    public function viewAuthorsBooks() {
        try {
            $authorController = new AuthorController;
            $authors = $authorController->index();
            
            $bookController = new BookController;
            $books = $bookController->index();
    
            return view('homePage', [
                'authors' => $authors,
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
        //
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
        //
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
        //
    }
}

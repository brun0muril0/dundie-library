<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{   
    public function viewAuthors() {
        $authors = $this->index();

        return view('authors.listAuthorsRegisteredPage',[
            'authors' => $authors
        ]);
    }

    public function authorsToCreateBook() {
        $authors = $this->index();
        
        return view('books.registerBooksPage',[
            'authors' => $authors
        ]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Author::orderBy('id_author')->get();

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
            'name' => 'string',
            'surname' => 'string',
            'birthday' => 'date',
            'country' => 'string',
            'biography' => 'string'
        ]);

        Author::create($validateData);

        return response('Autor cadastrado com sucesso!', 200);
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
        $validateData = $request->validate([
            'name' => 'string',
            'surname' => 'string',
            'birthday' => 'date',
            'country' => 'string',
            'biography' => 'string'
        ]);

        Author::where('id_author', $id)
              ->update($validateData);

        return response('Autor atualizado com sucesso!', 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Author::where('id_author', $id)
              ->delete();

        return response('Autor excluído com sucesso!', 200);
    }
}

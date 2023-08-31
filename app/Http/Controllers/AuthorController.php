<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Utils\ApiLogger;
use Illuminate\Http\Request;

class AuthorController extends Controller
{   
    /* Função responsável por buscar todos os autores e retornar para diferentes views */
    public static function viewAuthors($view) {
        try {
            $authors = self::index();
            
            return view($view, [
                'authors' => $authors
            ]);
        } catch (\Exception $e) {

            ApiLogger::exception(
                'AuthorController',
                'viewAuthors',
                $e
            );

            return response("Erro: " . $e, 500);
        }
    }

    /**
     * Display a listing of the resource.
     */
    public static function index()
    {
        try {
            $data = Author::orderBy('id_author')
                          ->get();
            return $data;
        } catch (\Exception $e) {

            ApiLogger::exception(
                'AuthorController',
                'index',
                $e
            );

            return response("Erro: " . $e, 500);
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
                'name' => 'string',
                'surname' => 'string',
                'birthday' => 'date',
                'country' => 'string',
                'biography' => 'string'
            ]);
            
            Author::create($validateData);
    
            return response('Autor cadastrado com sucesso!', 200);
        } catch (\Exception $e) {

            ApiLogger::exception(
                'AuthorController',
                'store',
                $e
            );

            return response("Erro ao cadastrar autor: " . $e, 500);
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
                'name' => 'string',
                'surname' => 'string',
                'birthday' => 'date',
                'country' => 'string',
                'biography' => 'string'
            ]);
    
            Author::where('id_author', $id)
                  ->update($validateData);
    
            return response('Autor atualizado com sucesso!', 200);
        } catch (\Exception $e) {

            ApiLogger::exception(
                'AuthorController',
                'update',
                $e
            );
            
            return response("Erro ao atualizar autor: " . $e, 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            Author::where('id_author', $id)
                  ->delete();
    
            return response('Autor excluído com sucesso!', 200);
        } catch (\Exception $e) {

            ApiLogger::exception(
                'AuthorController',
                'index',
                $e
            );

            return response("Erro ao excluir autor: " . $e, 500);
        }
    }
}

@extends('layoutDefault')

@section('head')
<title>Lista de livros - Dundie Library</title>
@endsection

@section('content')
<list-books-registered-page
    :books="{{ $books }}"
    :authors="{{ $authors }}">
</list-books-registered-page>
@endsection
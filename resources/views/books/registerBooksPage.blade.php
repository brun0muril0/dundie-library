@extends('layoutDefault')

@section('head')
<title>Cadastrar livros - Dundie Library</title>
@endsection

@section('content')
<register-books-page
    :authors="{{ $authors }}"
></register-books-page>
@endsection
@extends('layoutDefault')

@section('head')
<title>Listar autores - Dundie Library</title>
@endsection

@section('content')
<list-authors-registered-page
    :authors="{{ $authors }}" >
</list-authors-registered-page>
@endsection
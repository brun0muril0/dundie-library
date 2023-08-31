@extends('layoutDefault')

@section('head')
<title>Home - Dundie Library</title>
@endsection

@section('content')
<home-page 
    :authors="{{ $authors }}" 
    :books="{{ $books }}">
</home-page>
@endsection
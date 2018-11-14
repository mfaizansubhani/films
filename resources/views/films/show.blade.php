
@extends('main')
@section('title','View Film')

@section('content')
<p class="lead">This is the Film</p>
    <h1>
        {{$film->Name}}
    </h1>
    <h1>
        {{$film->Description}}
    </h1>
@endsection
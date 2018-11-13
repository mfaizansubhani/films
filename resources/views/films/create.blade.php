@extends('main')
@section('title','create')
@section('content')
<div class="row">
    <div class="col-md-8 offset-md-2">
        <h1>Create New Film</h1>
        <hr>
        {!! Form::open(array('route' => 'films.store', 'files' => true)) !!}
        {{Form::label('name','Name:')}}
        {{Form::text('name',null,array('class' => 'form-control'))}}
        {{Form::label('description','Description:')}}
        {{Form::textarea('description',null,array('class' => 'form-control'))}}
        <br>
        {{Form::label('date','Release Date:')}}

        {{Form::date('date', \Carbon\Carbon::now())}}
        <br>
        {{Form::label('rating','Rating:')}}
        {{Form::number('rating', 'value')}}
        <br>
        {{Form::label('price','Price:')}}
        {{Form::number('price', 'value')}}

        <br>
        {{Form::label('genre','genre:')}}
        {{Form::text('genre', null)}}
        <br>
        {{Form::label('photo','Photo:')}}
        {{Form::file('photo')}}
        {{Form::submit('Create film',array('class'=>'btn btn-success btn-lg'))}}
        {!! Form::close() !!}
    </div>
</div>
@endsection
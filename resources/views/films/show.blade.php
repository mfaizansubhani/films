
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
<div class="row">
    <div class="col-mid-8-offset-2">
        @foreach($film->comments as $comment)
            {{$comment->comment}}
            <br>
        @endforeach
    </div>
</div>

<div class="row">
    <div class="comment-form">
        {{ Form::open(['route' => ['comments.store',$film->id],'method' => 'POST']) }}
        <div class="row">
            <div class="col-md-6">
                {{ Form::label('name',"Name:") }}
                {{Form::text('name',null,['class' => 'form-control'])}}

            </div>
            <div class="col-md-12">
                {{ Form::label('comment',"Comment: " )}}
                {{ Form::textarea('comment',null,['class'=> ' form-control']) }}
                {{Form::submit('Add Comment',['class' => 'btn btn-success btn-block'])}}
            </div>
        </div>
        {{ Form::close() }}
    </div>
</div>
@endsection
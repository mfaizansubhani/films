@extends('main')
@section('title','All films')
@section('content')
<div class="row">
    <div class="col-md-10">
        <h1>All Films</h1>
    </div>
</div>

    <div class="row">
        <div class="col-md-12">
            <table class="table">
                <thead>
                <th>#</th>
                <th>Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Created at</th>
                </thead>
                <tbody>
                    @foreach($films as $film )
                    <tr>
                       <th>{{$film->id}}</th>
                        <td>{{$film->Name}}</td>
                        <td>{{$film->Description}}</td>
                        <td>{{$film->Price}}</td>
                        <td>{{$film->created_at}}</td>
                        <td><a href="{{route('films.show',$film->id)}}" class="btn btn-default btn-sm">View</a></td>
                    </tr>
                    <img src="images/catalog/{{$film->id}}.jpg" height="100px" width="100px" alt="images/catalog/{{$film->id}}.jpg">

                    @endforeach

                </tbody>
            </table>


            <div class="text-center">
    {!! $films->links() !!}
</div>

        </div>


@endsection
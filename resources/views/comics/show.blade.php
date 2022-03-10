@extends('layouts.home')

@section('content')
    <a href="{{route("comics.index")}}"><button type="button" class="btn btn-primary">back</button></a></th>
    <h1>{{$comic->title}}</h1>
    <p>{{$comic->description}}</p>
    <img src="{{$comic->thumb}}" alt="">
    <p>{{$comic->price}}</p>
    <p>{{$comic->series}}</p>
    <p>{{$comic->sale_date}}</p>
    <p>{{$comic->type}}</p>

    <form action="{{route("comics.destroy", $comic->id)}}" method="POST">
        @csrf
        @method("DELETE")
        <button type="submit" class="btn btn-danger">Elimina</button>
      </form>
    
      <a href="{{route("comics.index")}}"><button type="button" class="btn btn-primary">Back</button></a>
@endsection
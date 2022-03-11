@extends('layouts.home')

@section('content')
  <table class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col">id</th>
        <th scope="col">Title</th>
        <th scope="col">Description</th>
        <th scope="col">Thumb</th>
        <th scope="col">Price</th>
        <th scope="col">Series</th>
        <th scope="col">Sale_date</th>
        <th scope="col">Type</th>
      </tr>
      </tr>
    </thead>
    <tbody>
      @foreach ($comics as $elemento)
        <tr>
          <td scope="row">{{$elemento->id}}</td>
          <td>{{$elemento->title}}</td>
          <td>{{$elemento->description}}</td>
          <td><img src="{{$elemento->thumb}}" alt=""></td>
          <td>{{$elemento->price}}</td>
          <td>{{$elemento->series}}</td>
          <td>{{$elemento->sale_date}}</td>
          <td>{{$elemento->type}}</td>
          <td>
            <a href="{{ route('comics.show', $elemento->id) }}"><button type="button" class="btn btn-primary">Vedi</button></a>
            <a href="{{ route('comics.edit', $elemento->id) }}"><button type="button" class="btn btn-warning">Edita</button></a>
            <form action="{{route("comics.destroy", $elemento->id)}}" method="POST">
                @csrf
                @method("DELETE")
                <button type="submit" class="btn btn-danger" onclick="return confirm('Sei sicuro di voler eliminare questo fumetto?')">Rimuovi</button>
            </form>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
@endsection
  
  
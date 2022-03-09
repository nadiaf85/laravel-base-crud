@extends('layouts.home')

@section('content')
  <table class="table">
    <thead>
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
    </thead>

    <tbody>
      @foreach ($comics as $elemento)
        <tr>
          <td scope="row">{{$elemento->id}}</td>
          <td><a href="{{route("comics.show", $elemento->id )}}">{{$elemento->title}}</a></td>
          <td>{{$elemento->description}}</td>
          <td>{{$elemento->thumb}}</td>
          <td>{{$elemento->price}}</td>
          <td>{{$elemento->series}}</td>
          <td>{{$elemento->sale_date}}</td>
          <td>{{$elemento->type}}</td>
        </tr>
      @endforeach
    </tbody>
  </table>
@endsection

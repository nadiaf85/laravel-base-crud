@extends('layouts.home')

@section('title', $comic->title)

@section('content')
<div class="container">
    <h1>Modifica fumetto</h1>

    <form action="{{route('comics.update', $comic->id)}}" method="post">
        @csrf

        @method('PUT')

        <div class="form-group">
            <label for="title">Titolo</label>
            <input type="text" class="form-control" id="title" name="title" value="{{$comic->title}}" placeholder="Inserisci il titolo del fumetto">
        </div>
        <div class="form-group">
            <label for="description">Descrizione</label>
            <textarea class="form-control" id="description" name="description" placeholder="Inserisci la descrizione del fumetto">{{$comic->description}}</textarea>
        </div>
        <div class="form-group">
            <label for="thumb">Immagine</label>
            <input type="text" class="form-control" id="thumb" name="thumb" value="{{$comic->thumb}}" placeholder="Inserisci l'url dell'immagine del fumetto">
        </div>
        <div class="form-group">
            <label for="price">Prezzo</label>
            <input class="form-control" id="price" name="price" value="{{$comic->price}}" placeholder="Inserisci il prezzo del fumetto">
        </div>
        <div class="form-group">
            <label for="series">Serie</label>
            <input class="form-control" id="series" name="series" value="{{$comic->series}}" placeholder="Inserisci la serie del fumetto">
        </div>
        <div class="form-group">
            <label for="sale_date">Data di uscita</label>
            <input class="form-control it-date-datepicker" id="sale_date" name="sale_date" value="{{$comic->sale_date}}" placeholder="Inserisci la data in formato gg/mm/aaaa">
        </div>
        <div class="form-group">
            <label for="type">Tipo</label>
            <select class="form-control form-control-md" id="type" name="type">
                <option value="comic book" {{$comic->type == "comic book"? "selected" : ""}}>Comic Book</option>
                <option value="graphic novel" {{$comic->type == "graphic novel"? "selected" : ""}}>Graphic Novel</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Modifica</button>
    </form>
</div>
@endsection
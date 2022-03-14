@extends('layouts.home')

{{-- @section('title', $comic->title) --}}

@section('content')
<div class="container">
    <h1>Modifica fumetto</h1>

    <form action="{{route('comics.update', $comic->id)}}" method="post">
        @csrf

        @method('PUT')

        <div class="form-group">
            <label for="title">Titolo</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{old('title')??$comic->title}}" placeholder="Inserisci il titolo del fumetto">
        </div>
        <div class="form-group">
            <label for="description">Descrizione</label>
            <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" placeholder="Inserisci la descrizione del fumetto">{{old('description')??$comic->description}}</textarea>
        </div>
        <div class="form-group">
            <label for="thumb">Immagine</label>
            <input type="text" class="form-control @error('thumb') is-invalid @enderror" id="thumb" name="thumb" value="{{old('thumb')??$comic->thumb}}" placeholder="Inserisci l'url dell'immagine del fumetto">
        </div>
        <div class="form-group">
            <label for="price">Prezzo</label>
            <input class="form-control @error('price') is-invalid @enderror" id="price" name="price" value="{{old('price')??$comic->price}}" placeholder="Inserisci il prezzo del fumetto">
        </div>
        <div class="form-group">
            <label for="series">Serie</label>
            <input class="form-control @error('series') is-invalid @enderror" id="series" name="series" value="{{old('series')??$comic->series}}" placeholder="Inserisci la serie del fumetto">
        </div>
        <div class="form-group">
            <label for="sale_date">Data di uscita</label>
            <input class="form-control it-date-datepicker @error('sale_date') is-invalid @enderror" id="sale_date" name="sale_date" value="{{old('sale_date')??$comic->sale_date}}" placeholder="Inserisci la data in formato gg/mm/aaaa">
        </div>
        <div class="form-group">
            <label for="type">Tipo</label>
            <select class="form-control form-control-md" id="type" name="type">
                @php
                $selected = old("type") ?? $comic->type;
                @endphp
                <option value="comic book" {{$selected == "comic book"? "selected": ""}}>Comic Book</option>
                <option value="graphic novel" {{$selected == "graphic novel"? "selected": ""}}>Graphic Novel</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Modifica</button>
    </form>
</div>
@endsection
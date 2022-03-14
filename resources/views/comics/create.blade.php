@extends('layouts.home')

@section('content')
<div class="container">

    <h1>Crea fumetto</h1>
    
    <form action="{{route('comics.store')}}" method="post">
        @csrf

        <div class="form-group">
            <label for="title">Titolo</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" placeholder="Inserisci il titolo del fumetto" value="{{old("title")}}">
            @error('title')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="description">Descrizione</label>
            <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" placeholder="Inserisci la descrizione del fumetto">{{old("description")}}</textarea>
            @error('description')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="thumb">Immagine</label>
            <input type="text" class="form-control @error('thumb') is-invalid @enderror" id="thumb" name="thumb" placeholder="Inserisci l'url dell'immagine del fumetto" value="{{old("thumb")}}">
            @error('thumb')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="price">Prezzo</label>
            <input class="form-control @error('price') is-invalid @enderror" id="price" name="price" placeholder="Inserisci il prezzo del fumetto" value="{{old("price")}}">
            @error('price')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="series">Serie</label>
            <input class="form-control @error('series') is-invalid @enderror" id="series" name="series" placeholder="Inserisci la serie del fumetto" value="{{old("series")}}">
            @error('series')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="sale_date">Data di uscita</label>
            <input class="form-control it-date-datepicker @error('sale_date') is-invalid @enderror" id="sale_date" name="sale_date" placeholder="Inserisci la data in formato gg/mm/aaaa" value="{{old("sale_date")}}">
            @error('sale_date')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="type">Tipo</label>
            <select class="form-control form-control-md" id="type" name="type">
                <option value="comic book" {{old("type") == "comic book" ? "selected" : null}}>Comic Book</option>
                <option value="graphic novel" {{old("type") == "graphic novel" ? "selected" : null}}>Graphic Novel</option>
            </select>
            @error('type')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Crea</button>
    </form>
</div>
@endsection

@if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


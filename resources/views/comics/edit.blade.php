@extends('layouts.main')

@section('content')

<div class="_container my-5">
    <h1>Modifica di {{$comic->title}}</h1>
    <form action="{{ route('comics.update', $comic)}}" method="POST" class="my-5">
        {{-- token di sicurezza che necessario per rendere valido il form,
        in modo da impedire che form esterni possano inserire altri dati esterni --}}
        @csrf

        {{-- usare la direttiva @method di blade per passare da post a put --}}
        @method('PUT')

        <div class="mb-3">
            <label for="title" class="form-label">Titolo</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $comic->title }}" placeholder="Titolo">
        </div>

        <div class="mb-3">
            <label for="thumb" class="form-label">Immagine</label>
            <input type="text" class="form-control" id="thumb" name="thumb" value="{{ $comic->thumb }}" placeholder="Inserisci il percorso">
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="text" class="form-control" id="price" name="price" value="{{ $comic->price }}" placeholder="Prezzo">
        </div>

        <div class="mb-3">
            <label for="type" class="form-label">Tipo</label>
            <input type="text" class="form-control" id="type" name="type" value="{{ $comic->type }}" placeholder="Tipo">
        </div>

        <div class="mb-3">
            <label for="series" class="form-label">Serie</label>
            <input type="text" class="form-control" id="series"  name="series" value="{{ $comic->series }}" placeholder="Serie">
        </div>

         <div class="mb-3">
            <label for="sale_date" class="form-label">Data di uscita</label>
            <input type="text" class="form-control" id="sale_date"  name="sale_date" value="{{ $comic->sale_date }}" placeholder="Serie">
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Descrizione</label>
            <textarea type="text" class="form-control" id="description" cols="30" rows="10" name="description" placeholder="Descrizione">{{ $comic->description }}</textarea>
        </div>

        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Invia</button>
            <button type="reset" class="btn btn-secondary">Annulla</button>
        </div>

    </form>

</div>

@endsection

@section('titlePage')
    show
@endsection

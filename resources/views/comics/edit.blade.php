@extends('layouts.main')

@section('content')

<div class="_container my-5">

    {{-- creare una condizione che permette di stampare gli errori solo se presenti --}}
    {{-- $error->any() permette di capire se c'è qualsiasi errore in sessione.
    $error->all() elenca direttamente tutti gli errori presenti.
    Se è true allora con un ciclo foreach si estrapolano i messaggi di errore come
    un elenco all'interno di un alert --}}

    @if ($errors->any())
        {{-- @dump($errors) --}}
        <div class="alert alert-danger">
            <h5 class="text-danger">Attenzione, ci sono dei problemi da risolvere:</h5>
            @foreach ($errors->all() as $error )
            <ul>
                <li>
                    {{ $error }}
                </li>
            </ul>
            @endforeach
        </div>
    @endif

    <h1>Modifica di {{$comic->title}}</h1>
    <form action="{{ route('comics.update', $comic)}}" method="POST" class="my-5">
        {{-- token di sicurezza che necessario per rendere valido il form,
        in modo da impedire che form esterni possano inserire altri dati esterni --}}
        @csrf

        {{-- usare la direttiva @method di blade per passare da post a put --}}
        @method('PUT')

        <div class="mb-3">
            <label for="title" class="form-label">Titolo</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title', $comic->title) }}" placeholder="Titolo">
            @error('title')
                <small class="text-danger">
                    {{$message}}
                </small>
            @enderror

        </div>

        <div class="mb-3">
            <label for="thumb" class="form-label">Immagine</label>
            <input type="text" class="form-control @error('thumb') is-invalid @enderror" id="thumb" name="thumb" value="{{ old('thumb', $comic->thumb) }}" placeholder="Inserisci il percorso">
            @error('thumb')
                <small class="text-danger">
                    {{$message}}
                </small>
            @enderror

        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="text" class="form-control @error('price') is-invalid @enderror" id="price" name="price" value="{{ old('price', $comic->price) }}" placeholder="Prezzo">
            @error('price')
                <small class="text-danger">
                    {{$message}}
                </small>
            @enderror

        </div>

        <div class="mb-3">
            <label for="type" class="form-label">Tipo</label>
            <input type="text" class="form-control @error('type') is-invalid @enderror" id="type" name="type" value="{{ old('type', $comic->type) }}" placeholder="Tipo">
            @error('type')
                <small class="text-danger">
                    {{$message}}
                </small>
            @enderror

        </div>

        <div class="mb-3">
            <label for="series" class="form-label">Serie</label>
            <input type="text" class="form-control @error('series') is-invalid @enderror" id="series"  name="series" value="{{ old('series', $comic->series) }}" placeholder="Serie">
            @error('series')
                <small class="text-danger">
                    {{$message}}
                </small>
            @enderror

        </div>

         <div class="mb-3">
            <label for="sale_date" class="form-label">Data di uscita</label>
            <input type="text" class="form-control @error('sale_date') is-invalid @enderror" id="sale_date"  name="sale_date" value="{{ old('sale_date', $comic->sale_date) }}" placeholder="Serie">
            @error('sale_date')
                <small class="text-danger">
                    {{$message}}
                </small>
            @enderror
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Descrizione</label>
            <textarea type="text" class="form-control" id="description" cols="30" rows="10" name="description" placeholder="Descrizione">{{ old('description', $comic->description) }}</textarea>
        </div>

        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Modifica</button>
            <button type="reset" class="btn btn-secondary">Annulla</button>
        </div>

    </form>

</div>

@endsection

@section('titlePage')
    show
@endsection

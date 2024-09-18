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
    <h1>Inserisci un nuovo fumetto</h1>
    <form action="{{ route('comics.store')}}" method="POST" class="my-5">
        {{-- token di sicurezza che necessario per rendere valido il form,
        in modo da impedire che form esterni possano inserire altri dati esterni --}}
        @csrf

        {{-- il metodo old()permette di salvare i dati inseriti nel form ogni volta che si verifica un errore.
        In assenza di old() il sistema ricarica la pagina cancellando ciò che era stato compilato in precedenza nei campi --}}
        <div class="mb-3">
            <label for="title" class="form-label">Titolo</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" placeholder="Titolo" value="{{ old('title') }}">
            @error('title')
                <small class="text-danger">
                    {{$message}}
                </small>
            @enderror
        </div>

        <div class="mb-3">
            <label for="thumb" class="form-label">Immagine</label>
            <input type="text" class="form-control @error('thumb') is-invalid @enderror" id="thumb" name="thumb" placeholder="Inserisci il link dell'immagine" value="{{ old('thumb') }}">
            @error('thumb')
                <small class="text-danger">
                    {{$message}}
                </small>
            @enderror
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Prezzo</label>
            <input type="text" class="form-control @error('price') is-invalid @enderror" id="price" name="price" placeholder="Prezzo" value="{{ old('price') }}">
            @error('price')
                <small class="text-danger">
                    {{$message}}
                </small>
            @enderror
        </div>

        <div class="mb-3">
            <label for="type" class="form-label">Tipo</label>
            <input type="text" class="form-control @error('type') is-invalid @enderror" id="type" name="type" placeholder="Tipo" value="{{ old('type') }}">
            @error('type')
                <small class="text-danger">
                    {{$message}}
                </small>
            @enderror

        </div>

        <div class="mb-3">
            <label for="series" class="form-label">Serie</label>
            <input type="text" class="form-control @error('series') is-invalid @enderror" id="series"  name="series" placeholder="Serie" value="{{ old('series') }}">
            @error('series')
                <small class="text-danger">
                    {{$message}}
                </small>
            @enderror
        </div>

         <div class="mb-3">
            <label for="sale_date" class="form-label">Data di uscita</label>
            <input type="text" class="form-control @error('sale_date') is-invalid @enderror " id="sale_date"  name="sale_date" placeholder="Data di uscita" value="{{ old('sale_date') }}">

            @error('sale_date')
                <small class="text-danger">
                    {{$message}}
                </small>
            @enderror
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Descrizione</label>
            <textarea type="text" class="form-control" id="description" cols="30" rows="10" name="description" placeholder="Descrizione">{{old('description')}}</textarea>

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

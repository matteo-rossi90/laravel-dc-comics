@extends('layouts.main')

@section('content')

<div class="_container">
    <h1>Inserisci un nuovo fumetto</h1>
    <form action="{{ route('comics.store')}}" method="POST" class="my-5">
        {{-- token che genera un identificativo --}}
        @csrf

        <div class="mb-3">
            <label for="title" class="form-label">Titolo</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Titolo">
        </div>

        <div class="mb-3">
            <label for="thumb" class="form-label">Immagine</label>
            <input type="text" class="form-control" id="thumb" name="thumb" placeholder="Inserisci il percorso">
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="text" class="form-control" id="price" name="price" placeholder="Prezzo">
        </div>

        <div class="mb-3">
            <label for="type" class="form-label">Tipo</label>
            <input type="text" class="form-control" id="type" name="type" placeholder="Tipo">
        </div>

        <div class="mb-3">
            <label for="series" class="form-label">Serie</label>
            <input type="text" class="form-control" id="series"  name="series" placeholder="Serie">
        </div>

         <div class="mb-3">
            <label for="sale_date" class="form-label">Data di uscita</label>
            <input type="text" class="form-control" id="sale_date"  name="sale_date" placeholder="Serie">
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Descrizione</label>
            <textarea type="text" class="form-control" id="description" cols="30" rows="10" name="description" placeholder="Descrizione"></textarea>
        </div>

        <div class="mb-3">
            <button type="submit" href="" class="btn btn-primary">Invia</button>
            <button type="reset" href="" class="btn btn-secondary">Annulla</button>
        </div>

    </form>

</div>

@endsection

@section('titlePage')
    show
@endsection

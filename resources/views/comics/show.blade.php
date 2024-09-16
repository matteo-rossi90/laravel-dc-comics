@extends('layouts.main')

@section('content')

<div class="container">
    <div class="row g-3 py-5">
        <h1>{{ $fumetto->title }}</h1>
        <div class="col">
            <img src="{{ $fumetto->thumb }}" alt="{{$fumetto->title}} thumb " >
        </div>

        <div class="col-5">
            <h2>Descrizione</h2>
            <p>
                {{ $fumetto->description }}
            </p>

            <h2>Serie</h2>
            <p>{{ $fumetto->series }}</p>

            <h2>Prezzo</h2>
            <p>{{ $fumetto->price }}</p>

            <h2>Tipo</h2>
            <p>{{ $fumetto->type }}</p>

            <div class="d-flex my-5">
                <a class="btn btn-primary" href="{{ route('comics.index')}}">Torna alle offerte</a>
            </div>

        </div>




    </div>
</div>

@endsection

@section('titlePage')
    show
@endsection

@extends('layouts.main')

@section('content')

<div class="_container">

    <div class="row g-3 py-5">

        {{-- se il prodotto è stato caricato correttamente comunicarlo in pagina --}}
        @if (@session('edited'))
            <div class="alert alert-success" role="alert">
                {{session('edited')}}
            </div>
        @endif

        <div class="d-flex-justify-content-between">
            <h1>{{ $fumetto->title }}</h1>
            <small>Slug: {{$fumetto->slug}}</small>
        </div>
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

            <div class="d-flex justify-content-between my-5">
                <a class="btn btn-primary" href="{{ route('comics.index')}}">Torna alle offerte</a>
                <div class="d-flex spacing">
                    <a href="{{ route('comics.edit', $fumetto)}}" class="btn btn-warning">
                        <i class="fa-solid fa-pencil"></i>
                    </a>
                    @include('partials.formdelete')
                </div>
            </div>

        </div>




    </div>
</div>

@endsection

@section('titlePage')
    show
@endsection

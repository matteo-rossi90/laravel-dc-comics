{{-- questa view estende il file main.blade.php che è dentro la cartella view/layouts --}}
@extends('layouts.main')

@section('content')
        <section class="section-color">

            <!-- contenitore delle cards -->
            <div id="content" class="_container">

                <div class="box-blue">
                    <h3>CURRENT SERIES</h3>
                </div>

                <div id="box-cards">
                    <!-- inserimento dinamico in DOM delle cards -->
                    @foreach ( $comics as $fumetto )
                        <div class="card-items">

                            <img src="{{ $fumetto->thumb}}" alt="{{ $fumetto->title }}">
                            <h3>{{ $fumetto->title }}</h3>
                            <h4>{{ $fumetto->price }}</h4>

                            <div class="d-flex justify-content-between my-3">
                                <a href="{{ route('comics.show', $fumetto)}}" class="btn btn-primary">
                                    <i class="fa-solid fa-eye"></i>
                                </a>
                                <a href="{{ route('comics.edit', $fumetto)}}" class="btn btn-warning">
                                    <i class="fa-solid fa-pencil"></i>
                                </a>

                            </div>

                        </div>

                    @endforeach

                </div>

                <!-- pulsante load more -->
                <div id="btn-load">
                    <button class="box-blue">
                        <span>LOAD MORE</span>
                    </button>
                </div>

            </div>


    </section>


@endsection


@section('titlePage')
    comics
@endsection

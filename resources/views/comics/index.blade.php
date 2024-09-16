{{-- questa view estende il file main.blade.php che è dentro la cartella view/layouts --}}
@extends('layouts.main')

@section('content')
        <section class="section-color">

            <!-- contenitore delle cards -->
            <div id="content" class="container">

                <div class="box-blue">
                    <h3>CURRENT SERIES</h3>
                </div>

                <div id="box-cards">
                    <!-- inserimento dinamico in DOM delle cards -->
                    @foreach ( $comics as $fumetto )
                        <div class="card-items">

                            {{-- parte da modificare e stampare partendo dal db --}}
                            <img src="{{ $fumetto->thumb}}" alt="{{ $fumetto->title }}">
                            <h3>{{ $fumetto->title }}</h3>
                            <h4>{{ $fumetto->price }}</h4>
                            <h4>{{ $fumetto->series }}</h4>
                            <h4>{{ $fumetto->type }}</h4>

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

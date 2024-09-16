{{-- questa view estende il file main.blade.php che è dentro la cartella view/layouts --}}
@extends('layouts.main')

@section('content')

    <section>

        <div class="container">
            <div class="box">
                <h1 class="text-margin">{{ $title }}</h1>
                <p>
                    {{ $text }}
                </p>

            </div>

        </div>

    </section>


@endsection

@section('titlePage')
    contatti
@endsection

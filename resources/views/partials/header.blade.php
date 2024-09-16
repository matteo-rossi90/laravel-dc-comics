<?php

// $mainMenu = config('menu.main_menu');

?>
<header class="_container">
    <!-- logo -->
    <div id="box-image">
        <a href="#">
            <img src="{{ Vite::asset('resources/img/dc-logo.png') }}" alt="" class="">
        </a>
    </div>

    <!-- inserimento dinamico in DOM del menu di navigazione -->
    {{-- <nav>
        <ul>
        @foreach ($mainMenu as $item)
            <li>
                <a class="{{ Route::currentRouteName() === $item['name'] ? 'active' : '' }}" href="{{ route($item['name']) }}">{{ $item['text'] }}</a>
            </li>
        @endforeach
        </ul>
    </nav> --}}

    <nav>
        <ul>
            <li>
                <a href="{{ route('home') }}">Home</a>
                <a href="{{ route('comics.index') }}">I fumetti migliori</a>
                <a href="{{ route('contacts') }}">Contatti</a>
                <a href="{{ route('comics.create') }}">Nuovi fumetti</a>
            </li>
        </ul>
    </nav>

</header>

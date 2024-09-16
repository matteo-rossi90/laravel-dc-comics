<?php

$mainMenu = config('menu.main_menu');

?>
<header class="container">
    <!-- logo -->
    <div id="box-image">
        <a href="#">
            <img src="{{ Vite::asset('resources/img/dc-logo.png') }}" alt="" class="">
        </a>
    </div>

    <!-- inserimento dinamico in DOM del menu di navigazione -->
    <nav>
        <ul>
        @foreach ($mainMenu as $item)
            <li>
                <a class="{{ Route::currentRouteName() === $item['name'] ? 'active' : '' }}" href="{{ route($item['name']) }}">{{ $item['text'] }}</a>
            </li>
        @endforeach
        </ul>
    </nav>

</header>

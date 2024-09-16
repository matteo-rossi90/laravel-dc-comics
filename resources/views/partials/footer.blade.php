@php

$mainMenu = config('menu.main_menu');
$shop = config('menu.shopItems');
$dc_items = config('menu.dcItems');
$sites = config('menu.siteItems');
$follow = config('menu.socialItems');

@endphp

    <!-- sezione della parte superiore del footer -->
    <section>

        <div class="background">

            <div class="container">

                <div id="flex-wrap">

                    <!-- colonna che riguarda i menu DC Comics e Shop -->
                    <div class="col">

                        <nav class="navigation">

                            <h3>DC Comics</h3>

                            <!-- inserimento dinamico del menu DC Comics -->
                            <ul>
                                @foreach ($mainMenu as $menu )
                                    <li>
                                        <a href="{{ route($menu['name'])}}">{{ $menu['text']}}</a>
                                    </li>
                                @endforeach
                            </ul>

                        </nav>
                        <nav class="navigation">
                            <h3>SHOP</h3>

                            <!-- inserimento dinamico del menu Shop -->
                            <ul>

                               @foreach ($shop as $item )
                                    <li>
                                    <a href="#">{{ $item['text']}}</a>
                                    </li>
                                @endforeach

                            </ul>
                        </nav>
                    </div>

                    <!-- colonna che riguarda il menu DC -->
                    <div class="col">
                        <nav class="navigation">
                            <h3>DC</h3>

                            <!-- inserimento dinamico del menu DC -->
                            <ul>

                                @foreach ($dc_items as $dc )
                                    <li>
                                        <a href="#">{{ $dc['text']}}</a>
                                    </li>
                                @endforeach

                            </ul>

                        </nav>
                    </div>

                    <!-- colonna che riguarda il menu Sites -->
                    <div class="col">
                        <nav class="navigation">
                            <h3>SITES</h3>

                            <!-- inserimento dinamico del menu Sites -->
                            <ul>

                                @foreach ($sites as $siti )
                                    <li>
                                    <a href="#">{{ $siti['text']}}</a>
                                    </li>
                                @endforeach


                            </ul>
                        </nav>
                    </div>

                </div>

            </div>


        </div>

    </section>

    <!-- sezione della parte inferiore del footer -->
    <section id="bottom-bar">
        <div class="container" id="flex-container">

            <!-- pulsante per l'iscrizione -->
            <a href="#" id="btn-sign">
                <span>SIGN-UP NOW!</span>
            </a>

            <!-- Area social -->
            <div id="list-icon">
                <h3 id="title">FOLLOW US</h3>

                <!-- inserimento dinamico in DOM dei social -->
                <nav>
                    <ul>
                        @foreach ( $follow as $social )
                            <li>
                                <a href="#">
                                    <img src="{{ $social['image'] }}" :alt="{{$social['text']}}">
                                </a>
                            </li>

                        @endforeach
                    </ul>
                </nav>
            </div>

        </div>
    </section>

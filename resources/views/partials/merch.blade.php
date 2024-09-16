@php
 $products = config('menu.merchItems');
@endphp

<section id="merch">
    <div class="container">
        <!-- icone con menu per i prodotti -->
        <nav>
            <ul>
                @foreach ( $products as $merch )
                    <li>
                        <img src="{{ Vite::asset($merch['image']) }}" alt="">
                        <a href="#">{{ $merch['text']}}</a>
                    </li>

                @endforeach
            </ul>
        </nav>
    </div>
</section>

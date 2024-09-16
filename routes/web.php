<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    $title = 'Fumetti per tutti';
    $text = 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis nemo magnam quaerat ipsum ipsam
            laboriosam eos architecto qui, facere unde, magni error officia aliquid vitae quisquam quis! Repellendus
            laudantium nihil aperiam quae labore vel, cum repellat consectetur nobis quasi! Aut similique eveniet, adipisci
            atque cupiditate nihil minus, veniam laborum debitis aliquid quibusdam ducimus ipsa sequi harum unde dolore fugit!
            Eaque reprehenderit dicta quidem earum esse, culpa qui porro perferendis dolorem. Sed, placeat. Fugiat, eius magnam
            dignissimos ea architecto impedit molestias ex, inventore veritatis repellat odit voluptate
            provident error sed quam blanditiis quis beatae voluptas tenetur sequi reiciendis. Voluptatibus, beatae optio!';

    return view('home', compact('title', 'text'));
})->name('home');

Route::get('/comics', function () {

    $comics = config('comics');

    return view('comics', compact('comics'));
})->name('comics');

Route::get('/contacts', function () {

    $title = 'Scrivici';

    $text = 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis nemo magnam quaerat ipsum ipsam
    laboriosam eos architecto qui, facere unde, magni error officia aliquid vitae quisquam quis! Repellendus
    laudantium nihil aperiam quae labore vel, cum repellat consectetur nobis quasi! Aut similique eveniet, adipisci
    atque cupiditate nihil minus, veniam laborum debitis aliquid quibusdam ducimus ipsa sequi harum unde dolore fugit!
    Eaque reprehenderit dicta quidem earum esse, culpa qui porro perferendis dolorem. Sed, placeat. Fugiat, eius magnam
    dignissimos ea architecto impedit molestias ex, inventore veritatis repellat odit voluptate
    provident error sed quam blanditiis quis beatae voluptas tenetur sequi reiciendis. Voluptatibus, beatae optio!';

    return view('contacts', compact('title', 'text'));
})->name('contacts');

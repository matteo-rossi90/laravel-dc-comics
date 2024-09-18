<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comic;
use App\Functions\Helper;
use App\Http\Requests\ComicRequest;

class ComiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comics = Comic::orderBy('id', 'desc')->get();
        return view('comics.index', compact('comics'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('comics.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ComicRequest $request)
    {
        //validare i campi obbligatori usando validate()
        //validate() accetta sempre un array associativo le cui chiavi corrispondono
        //a i campi dell'entità da rendere obligatori

        // $request->validate([
            // 'title'=>'required|min:4|max:100',
            // 'thumb'=>'required|min:4',
            // 'price'=>'required|min:3|max:50',
            // 'series'=>'required|min:4|max:100',
            // 'sale_date'=>'required',
            // 'type'=>'required|min:3',
        // ],[
            // 'title.required'=>'Il titolo è un campo obbligatorio',
            // 'title.min'=>'Il titolo deve contenere almeno :min caratteri',
            // 'title.max'=>'Il titolo deve contenere al massimo :max caratteri',
            // 'thumb.required'=>'L\'immagine è un campo obbligatorio',
            // 'thumb.min'=>'Il link dell\'immagine deve contenere almeno 4 caratteri',
            // 'price.required' => 'Il prezzo è un campo obbligatorio',
            // 'price.min' => 'Il prezzo deve contenere almeno :min caratteri',
            // 'price.max'=> 'Il prezzo deve contenere massimo :max caratteri',
            // 'series.required' => 'La serie è un campo obbligatorio',
            // 'series.min' => 'La serie deve contenere almeno :min caratteri',
            // 'series.max' => 'La serie deve contenere al massimo :max caratteri',
            // 'sale_date.required' =>'La data è un campo obbligatorio',
            // 'type.required' => 'Il tipo è un campo obbligatorio'
        // ]
        // );

        //salvare nella variabile data tutti i dati contenuti in $request
        $data = $request->all();

        //creare una nuova istanza di comics
        $new_comic = new Comic();
        $new_comic->slug = Helper::generateSlug($data['title'], Comic::class);
        $new_comic->fill($data);
        $new_comic->save(); //salvare i dati

        //reindirizzare alla pagina show passando l'id
        return redirect()->route('comics.show', $new_comic->id);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)

    {

        //filtrare gli elementi estratti attraverso il numero id
        $fumetto = Comic::find($id);

        if (!isset($fumetto)) {
            abort(404);
        }

        return view('comics.show', compact('fumetto'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $comic = Comic::find($id);

        return view('comics.edit', compact('comic'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ComicRequest $request, string $id)
    {
        // $request->validate(
            // [
                // 'title' => 'required|min:4|max:100',
                // 'thumb' => 'required|min:4',
                // 'price' => 'required|min:3|max:50',
                // 'series' => 'required|min:4|max:100',
                // 'sale_date' => 'required',
                // 'type' => 'required|min:3',
            // ],
            // [
                // 'title.required' => 'Il titolo è un campo obbligatorio',
                // 'title.min' => 'Il titolo deve contenere almeno :min caratteri',
                // 'title.max' => 'Il titolo deve contenere al massimo :max caratteri',
                // 'thumb.required' => 'L\'immagine è un campo obbligatorio',
                // 'thumb.min' => 'Il link dell\'immagine deve contenere almeno 4 caratteri',
                // 'price.required' => 'Il prezzo è un campo obbligatorio',
                // 'price.min' => 'Il prezzo deve contenere almeno :min caratteri',
                // 'price.max' => 'Il prezzo deve contenere massimo :max caratteri',
                // 'series.required' => 'La serie è un campo obbligatorio',
                // 'series.min' => 'La serie deve contenere almeno :min caratteri',
                // 'series.max' => 'La serie deve contenere al massimo :max caratteri',
                // 'sale_date.required' => 'La data è un campo obbligatorio',
                // 'type.required' => 'Il tipo è un campo obbligatorio'
            // ]
        // );

        $data = $request->all();
        $comic = Comic::find($id);

        // dump($data);
        // dump($id);

        //se il titolo è cambiato, generare un nuovo slug, altrimenti resta lo stesso
        if($data['title'] != $comic->title){
            $data['slug'] = Helper::generateSlug($data['title'], Comic::class);
        }

        //inizializzare l'update del dato
        $comic->update($data);

        return redirect()->route('comics.show', $comic)->with('edited', 'Prodotto caricato con successo!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $comic = Comic::find($id);
        $comic->delete();

        return redirect()->route('comics.index')->with('deleted', 'Il fumetto ' . $comic->title . ' è stato eliminato correttamente');
    }
}

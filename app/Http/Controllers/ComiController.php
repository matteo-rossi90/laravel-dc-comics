<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comic;
use App\Functions\Helper;

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
    public function store(Request $request)
    {
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
    public function update(Request $request, string $id)
    {
        $data = $request->all();
        $comic = Comic::find($id);

        // dump($data);
        // dump($id);

        //se il titolo è cambiato, generare un nuovo slug, altrimenti resta lo stesso
        if($data['title'] == $comic->title){
            $data['slug'] = $comic->slug;
        }else{
            $data['slug'] = Helper::generateSlug($data['title'], Comic::class);
        }

        //inizializzare l'update del dato
        $comic->update($data);

        return redirect()->route('comics.show', $comic);
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

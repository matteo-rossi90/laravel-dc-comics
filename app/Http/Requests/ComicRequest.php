<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ComicRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        //array che elenca tutti i campi dell'entità da rendere obbligatori
        return [

            'title' => 'required|min:4|max:100',
            'thumb' => 'required|min:4',
            'price' => 'required|min:3|max:50',
            'series' => 'required|min:4|max:100',
            'sale_date' => 'required',
            'type' => 'required|min:3',

        ];
    }

    public function messages(){

        //funzione che restituisce i messaggi di errore customizzati
        return [

            'title.required' => 'Il titolo è un campo obbligatorio',
            'title.min' => 'Il titolo deve contenere almeno :min caratteri',
            'title.max' => 'Il titolo deve contenere al massimo :max caratteri',
            'thumb.required' => 'L\'immagine è un campo obbligatorio',
            'thumb.min' => 'Il link dell\'immagine deve contenere almeno 4 caratteri',
            'price.required' => 'Il prezzo è un campo obbligatorio',
            'price.min' => 'Il prezzo deve contenere almeno :min caratteri',
            'price.max' => 'Il prezzo deve contenere massimo :max caratteri',
            'series.required' => 'La serie è un campo obbligatorio',
            'series.min' => 'La serie deve contenere almeno :min caratteri',
            'series.max' => 'La serie deve contenere al massimo :max caratteri',
            'sale_date.required' => 'La data è un campo obbligatorio',
            'type.required' => 'Il tipo è un campo obbligatorio'
        ];
    }
}

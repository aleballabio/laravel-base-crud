<?php

namespace App\Http\Controllers;

use App\Comic;
use Doctrine\DBAL\Schema\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class ComicController extends Controller
{
    protected $validationRules = [
        'title'             => 'required|unique:comics|min:5|max:150',
        'description'             => 'nullable|string|max:1000',
        'thumb'          => 'nullable|url|max:300',
        'price'              => 'required|numeric|between:0, 999.99',
        'series'           => 'required|string|max:300',
        'sale_date'              => 'date|max:25',
        'type'      => 'required|string|min:0|max:100',
    ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comic = Comic::paginate(5);
        $data = [
            'comics' => $comic,
        ];

        // logica + chiamate al database

        return view('comics.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Comic $comic)
    {
        //

        {
            return view('comics.create');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Comic $comic)
    {
        //

        $request->validate($this->validationRules);



        $formData = $request->all();
        $formData['price'] = $formData['price'] * 100;
        $newComic = Comic::create($formData);
        $newComic->save();

        // return redirect()->route('comics.create'); per il redirect sul create
        return redirect()->route('comics.index');
        // return redirect()->route('comics.show', $newComic->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Comic  $comic
     * @return \Illuminate\Http\Response
     */
    public function show(Comic $comic)
    {
        return view('comics.show', [
            'comic' =>  $comic,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Comic  $comic
     * @return \Illuminate\Http\Response
     */
    public function edit(Comic $comic)
    {
        //
        return view('comics.edit', compact('comic'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comic  $comic
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comic $comic)
    {
        //
        $this->validationRules['title'] = [
            'title'             =>
            'required',
            Rule::unique('comics')->ignore($comic),
            'min:5',
            'max:150',
        ];
        $request->validate($this->validationRules);
        $formData = $request->all();
        $formData['price'] = $formData['price'] * 100;
        $comic->update($formData);
        return redirect()->route('comics.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comic  $comic
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comic $comic)
    {
        //

        $comic->delete();
        return redirect()->route('comics.index');
    }
}
<?php

namespace App\Http\Controllers;

use App\Comic;
use Illuminate\Http\Request;

class ComicController extends Controller
{
    protected $validator =  [
        'title' => 'required|max:50',
        'author' => 'required|max:30',
        'price' => 'required|numeric',
        'genre' => 'required|max:50',
        'photo' => 'nullable|max:255',
        'description' => 'nullable',
    ];


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comics = Comic::paginate(15);
        $data = [
            'comic' => $comics,
            'title' => 'Comic - Homepage'
        ];

        return view('comics.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('comics.create', ['title' => 'New Comic']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate($this->validator);

        $data = $request->all();
        $comic = new Comic();
        $comic->fill($data);
        $save = $comic->save();

        if (!$save) {
            dd('ritenta, sarai piu fortunato');
        }
        
        return redirect()->route('comics.show', $comic)->with('status', "The Comic: $comic->title saved!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Comic  $comic
     * @return \Illuminate\Http\Response
     */
    public function show(Comic $comic)
    {
        $data = [
            'comic' => $comic,
            'title' => $comic->name
        ];
        return view('comics.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Comic  $comic
     * @return \Illuminate\Http\Response
     */
    public function edit(Comic $comic)
    {
        
        return view('comics.edit', ['comic'=> $comic]);
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
        $request->validate($this->validator);


        $data = $request->all();
        $updated = $comic->update($data);

        if (!$updated) {
            dd('ritenta, sarai piu fortunato');
        }
        return redirect()->route('comics.show', $comic);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comic  $comic
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comic $comic)
    {
        $comic->delete();
        return redirect()->route('comics.index')->with('status', "The Comic: $comic->title Deleted!");
    }
}

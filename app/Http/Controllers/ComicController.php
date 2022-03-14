<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comic;
use Illuminate\Validation\Rule;

class ComicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comics = Comic::all();
        return view('comics.index',compact('comics'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('comics.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "title"=>"required|string|max:80|unique:comics",
            "description"=>"required|string",
            "thumb"=>"required|url",
            "price"=>"required|numeric|between:0 , 999.99",
            "series"=>"required|string",
            "sale_date"=>"required|date",
            "type"=>[
                "required",
                Rule::in(['comic book','graphic novel'])
            ],
        ]);

        $data = $request->all();
        
        $fumetto = new Comic();
            $fumetto->title = $data['title'];
            $fumetto->description = $data['description'];
            $fumetto->thumb = $data['thumb'];
            $fumetto->price = $data['price'];
            $fumetto->series = $data['series'];
            $fumetto->sale_date = $data['sale_date'];
            $fumetto->type = $data['type'];
            $fumetto->save();

            // fumetto = new Comic();
            // fumetto->fill($data);
            // fumetto->save();

        return redirect()->route('comics.show', $fumetto->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Comic $comic)
    {
        //$comic = Comic::where('id',$id)->get();
        //$comic = Comic::find($id);

        return view('comics.show',compact('comic'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Comic $comic)
    {
        return view('comics.edit',compact('comic'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comic $comic)
    {
        $request->validate([
            "title"=>"required|string|max:80|unique:comics,title,{$comic->id}",
            "description"=>"required|string",
            "thumb"=>"required|url",
            "price"=>"required|numeric| between:0 , 999.99",
            "series"=>"required|string",
            "sale_date"=>"required|date",
            "type"=>[
                "required",
                Rule::in(['comic book','graphic novel'])
            ],
        ]);

        $data = $request->all();

        $comic = new Comic();
            $comic->title = $data['title'];
            $comic->description = $data['description'];
            $comic->thumb = $data['thumb'];
            $comic->price = $data['price'];
            $comic->series = $data['series'];
            $comic->sale_date = $data['sale_date'];
            $comic->type = $data['type'];
            $comic->save();

        return redirect()->route('comics.show', $comic->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comic $comic)
    {
        $comic->delete();

        return redirect()->route('comics.index');
    }
}

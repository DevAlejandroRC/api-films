<?php

namespace App\Http\Controllers;

use App\Models\Movies;
use Illuminate\Http\Request;

class MoviesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $movies = Movies::all();
        return $movies;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $movies = new Movies();
        $movies->title = $request->name;
        $movies->original_language = $request->language;
        $movies->genres = $request->genres;
        $movies->poster = $request->image;
        $movies->release_date = $request->date;

        $movies->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Movies  $movies
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $movies = Movies::find($id);
        return $movies;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Movies  $movies
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $movies = Movies::find($id);

        $movies->title = $request->name;
        $movies->original_language = $request->language;
        $movies->genres = $request->genres;
        $movies->poster = $request->image;
        $movies->release_date = $request->date;

        $movies->update();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Movies  $movies
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $movies = Movies::find($id);
        if(is_null($movies))
        {
            return response()->json('No es psoible realziar la operación', 404);
        }
        $movies->delete();
        return response()->noContent();
    }
}

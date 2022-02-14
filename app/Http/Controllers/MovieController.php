<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $movie = Movie::get();
        echo json_encode($movie);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
  
    public function store(Request $request)
    {
        $movie = new Movie;

        $movie->name = $request->input('name');
        $movie->description = $request->input('description');
        $movie->gender = $request->input('gender');
        $movie->year = $request->input('year');
        $movie->duration = $request->input('duration');
        $movie->save();
        echo json_encode($movie);
        /** 
        $data= json_decode( json_encode($movie), true);
        echo $data;
        */
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Movie  $movie
     * @return \Illuminate\Http\Response
     */


    public function update(Request $request, $movie_id)
    {
        $movie = Movie::find($movie_id);

        $movie->name = $request->input('name');
        $movie->description = $request->input('description');
        $movie->gender = $request->input('gender');
        $movie->year = $request->input('year');
        $movie->duration = $request->input('duration');
        $movie->save();
        echo json_encode($movie);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function destroy($movie_id)
    {
        $movie = Movie::find($movie_id);
        $movie->delete();
    }
}

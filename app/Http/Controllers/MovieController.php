<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function index()
    {
        $movies = Movie::all();
        return view('movies/index',['movies'=>$movies]);
    }
    public function create()
    {
        return view('movies/create');
    }
    public function show(Movie $movie)
    {
        return view('movies.show',['movie'=>$movie]);
    }
    public function store()
    {
        request()->validate([
            'title' => 'required',
            'cast' => 'required',
            'producer' => 'required',
            'release_date' => 'required',
            'budget' => 'required',
            'genre' => 'required',
            
        ]);
        /*if (request()->hasFile('image')) {
            $imageName = time().'.'.request()->image_name->extension();
            $doctor->image_name=  $imageName;
            request()->image_name->storeAs('profilephotos', $imageName,'public');
        }*/
        Movie::create([
            'title' => request('title'),
            'cast' => request('cast'),
            'producer' => request('producer'),
            'release_date' => request('release_date'),
            'budget' => request('budget'),
            'genre' => request('genre'),
            'image_name' => $imageName
        ]);
        return redirect('/movies');

    }
    public function edit(Movie $movie)
    {
        return view('movies/edit',['movie'=>$movie]);
    }
    public function update(Movie $movie)
    {
        request()->validate([
            'title' => 'required',
            'cast' => 'required',
            'producer' => 'required',
            'release_date' => 'required',
            'budget' => 'required',
            'genre' => 'required'
        ]);
        $movie->update([
            'title' => request('title'),
            'cast' => request('cast'),
            'producer' => request('producer'),
            'release_date' => request('release_date'),
            'budget' => request('budget'),
            'genre' => request('genre')
        ]);
        return redirect('/movies/'.$movie->id);

    }
    public function destroy(Movie $movie){
        $movie->delete();
        return redirect('/movies');
    }
}

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
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:4096'
        ]);
        $image='';
        if (request()->hasFile('image')) {
            /*dd(request()->file('image'));*/
            $image = time().'.'.request()->image->extension();
            request()->image->move(public_path('images'), $image);
        }
        Movie::create([
            'title' => request('title'),
            'cast' => request('cast'),
            'producer' => request('producer'),
            'release_date' => request('release_date'),
            'budget' => request('budget'),
            'genre' => request('genre'),
            'image' => $image
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
            'genre' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:4096'
        ]);
        $image='';
        if (request()->hasFile('image')) {
            /*dd(request()->file('image'));*/
            $image = time().'.'.request()->image->extension();
            request()->image->move(public_path('images'), $image);
        }
        else{
            $image= request('image');
        }
        $movie->update([
            'title' => request('title'),
            'cast' => request('cast'),
            'producer' => request('producer'),
            'release_date' => request('release_date'),
            'budget' => request('budget'),
            'genre' => request('genre'),
            'image'=> $image
        ]);
        return redirect('/movies/'.$movie->id);

    }
    public function destroy(Movie $movie){
        $movie->delete();
        return redirect('/movies');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function index(Movie $movie, Request $request, $name = null)
    {
        if (!$name) {
            $name = $request->query('name');
        }

        $moviesQuery = Movie::query();

        if ($name) {
            $moviesQuery->where('name', 'like', "%$name%")->where(function ($query) {
                $query->where('user_id', auth()->user()->id)->orWhere('user_id', null);
            });
        } else {
            $moviesQuery->where(function ($query) {
                $query->where('user_id', auth()->user()->id)->orWhere('user_id', null);
            });
        }

        $movies = $moviesQuery->get();

        return view('index', ['movies' => $movies]);
    }

    public function home()
    {
        return view('home');
    }

    public function homepage()
    {
        return view('homepage');
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        Movie::create([
            'name' => $request->name,
            'duration' => $request->duration,
            'synopsis' => $request->synopsis,
            'user_id' => auth()->user()->id,
        ]);
        return redirect('/index');
    }

    public function show(Movie $movie)
    {
        return view('show', compact('movie'));
    }

    public function edit(Movie $movie)
    {
        return view('edit', compact('movie'));
    }

    public function update(Request $request, Movie $movies)
    {
        $movies->update([
            'name' => $request->name,
            'duration' => $request->duration,
            'synopsis' => $request->synopsis,
        ]);
        return redirect('/index');
    }

    public function deleteMovie(Movie $movie)
    {
        $movie->delete();
        return redirect('/index');
    }
}

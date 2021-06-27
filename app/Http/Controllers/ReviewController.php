<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Pelicula;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    private $rules;

    public function __construct(){
        $this->middleware('auth')->except('peliculaIndex');

        $this->rules = [
            'resena' => 'required|string|min:5',
            'valoracion' => 'required|integer|min:1',
        ];
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $peliculas = Pelicula::all();
        $users = User::all();
        $reviews = Auth::user()->reviews()->get(); //listado de solo ese usuario 
        return view('review.reviewIndex', compact('reviews', 'users', 'peliculas'));
    }

    public function general(Pelicula $pelicula){
        $reviews = $pelicula->reviews()->get(); //listado de solo esa pelicula
        $peliculas = Pelicula::all();
        $users = User::all();
        return view('review.reviewIndex', compact('reviews', 'users', 'peliculas', 'pelicula'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function nuevo(Pelicula $pelicula){
        return view('review.reviewForm', compact('pelicula'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate($this->rules);
        $request->merge([
            'user_id' => Auth::id(),
            'pelicula_id' => $request->pelicula_id,
        ]);
        Review::create($request->all());
        return redirect()->route('pelicula.index');
    }

    public function almacenar(Request $request, Pelicula $pelicula)
    {       
        $request->validate($this->rules);
        $request->merge([
            'user_id' => Auth::id(),
            'pelicula_id' => $pelicula->id,
        ]);
        Review::create($request->all());
        return redirect()->route('pelicula.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function show(Review $review)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function edit(Review $review)
    {
        return view('review.reviewForm');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Review $review)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function destroy(Review $review)
    {
        $review->delete();
        return redirect()->route('pelicula.index');
    }
}

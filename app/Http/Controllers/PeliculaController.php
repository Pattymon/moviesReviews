<?php

namespace App\Http\Controllers;

use App\Models\Pelicula;
use App\Models\Actor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class PeliculaController extends Controller
{
    private $rules;

    public function __construct(){
        $this->middleware('auth')->except('peliculaIndex');
        $this->rules = [
            'duracion' => 'required|integer|min:2',
            'year' => 'required|integer|min:4',
            'descripcion' => 'required|string|min:35',
            'imagen' => 'required|string|max:1024',
        ];
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $peliculas = Pelicula::with('user')->get();
        return view('pelicula.peliculaIndex', compact('peliculas'));
    }

    public function mispeliculas()
    {
        $peliculas = Auth::user()->peliculas()->with('user')->get(); //listado de solo ese usuario 
        return view('pelicula.peliculaMisPeliculas', compact('peliculas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pelicula.peliculaForm');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate($this->rules + ['nombre' => 'required|string|min:2|max:255|unique:App\Models\Pelicula,nombre']);
        //$request->merge(['user_id' => Auth::id()]);

        //Pelicula::create($request->all());

        $pelicula = new Pelicula($request->all());
        $user = Auth::user();
        $user->peliculas()->save($pelicula);
        
        return redirect()->route('pelicula.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pelicula  $pelicula
     * @return \Illuminate\Http\Response
     */
    public function show(Pelicula $pelicula)
    {
        $actores = Actor::get();
        return view('pelicula.peliculaShow', compact('pelicula', 'actores'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pelicula  $pelicula
     * @return \Illuminate\Http\Response
     */
    public function edit(Pelicula $pelicula)
    {
        return view('pelicula.peliculaForm', compact('pelicula'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pelicula  $pelicula
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pelicula $pelicula)
    {
        $request->validate($this->rules);

        Pelicula::where('id', $pelicula->id)->update($request->except('_token', '_method'));
        return redirect()->route('pelicula.show', $pelicula);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pelicula  $pelicula
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pelicula $pelicula)
    {
        $pelicula->delete();
        return redirect()->route('pelicula.index');
    }

    /**
     * Agregar un actor a una pelicula
     * 
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pelicula  $pelicula
     * @return \Illuminate\Http\Response
     */
    
    public function agregarActor(Request $request, Pelicula $pelicula){
        $pelicula->actores()->sync($request->actor_id);
        return redirect()->route('pelicula.show', $pelicula);
    }

    public function nuevoActor(Request $request, Pelicula $pelicula){
        $request->validate($this->rules + ['nombre' => 'required|string|min:2|max:255|unique:App\Models\Actor,nombre']);
        Actor::create($request->all());
        $pelicula->actores()->sync($request->actor_id);
        return redirect()->route('pelicula.show', $pelicula);
    }
}

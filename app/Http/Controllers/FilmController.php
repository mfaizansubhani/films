<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use App\Films;
use Illuminate\Support\Facades\Session;

class FilmController extends Controller
{ public function __construct()
{
    $this->middleware('auth')->except('index');
}

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { $films = Films::paginate(1);
        return view('films.index')->withFilms($films);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('films.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,array(
            'name'=>'required'
        ));

        $films = new Films;
        $films->Name = $request->name;
        $films->Description = $request->description;
        $films->ReleaseDate = $request->date;
        $films->Rating = $request->rating;
        $films->Price = $request->price;
        $films->Genre = $request->genre;
        $films->Photo = $request->photo;
        $films->slug = $films->Name;


        $films->save();

        $imageName = $films->id . '.' .
            $request->file('photo')->getClientOriginalExtension();

        $request->file('photo')->move(
            base_path() . '/public/images/catalog/', $imageName);

        $request->session()->flash('success','Film Saved.');
        return redirect()->route('films.show',$films->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $film = Films::find($id);
        return view('films.show')->withFilm($film);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request) {
        Auth::logout();
        return redirect('/login');
    }

    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getSingle($slug)
    {
        $film = Films::where('slug','=',$slug)->first();
        return view('films.show')->withFilm($film);
    }


}

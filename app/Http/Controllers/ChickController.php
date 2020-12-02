<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chick;
use App\Models\User;
use Illuminate\Support\Facades\DB;


class ChickController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $chicks = Chick::with('comments')->latest()->get();

        return view('chicks.index', ['chicks' => $chicks]);

        // return view('chicks.index', [
        //     'chicks' => auth()->user()->timeline(),
        // ]);
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'chickPost' => 'required|min:5|max:255',
            'image' => '',
            'tags' => 'min:2|max:50',
        ]);

        $chick = new Chick;
        $chick->user_id = auth()->id();
        $chick->content = $request->input('chickPost');
        $chick->image = $request->input('image');
        $chick->tags = $request->input('tags');

        $chick->save();

        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Chick $chick)
    {
        return view('chicks.show', compact('chick'));
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
    public function update(Chick $chick)
    {
        $attributes = request()->validate([
            'content' => 'required|min:5|max:255',
            'image' => '',
            'tags' => ''
        ]);

        $chick->update($attributes);
        return redirect()->back()->with('message', 'Chick mis à jour !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Chick $chick)
    {
        // $attributes = request()->input('chickId');
        // $chick->where($attributes)->delete();

        if (auth()->user()->id == $chick->user_id) {
            $chick->delete();
            return redirect()->back()->with('message', 'Chick supprimé !');
        }
        else {
            return redirect()->back()->withErrors(['user_error'], 'Il faut être l\'auteur de ce Chick pour le supprimer !');
        }
    }

    public function search(Request $request)
    {
        $request->validate([
            'q' => 'required',
        ]);

        $recherche = $request->input('q');

        $chicks = DB::table('chicks')
        ->where('chicks.content', 'like', "%$recherche%")
        ->orWhere('chicks.tags', 'like', "%$recherche%")
        ->join('users', 'users.id', '=', 'chicks.user_id')
        ->join('comments', 'comments.chick_id', '=', 'chicks.id')
        ->get();

        return view('chicks.search', ['chicks' => $chicks]);
    }
}

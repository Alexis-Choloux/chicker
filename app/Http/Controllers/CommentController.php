<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Chick;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('comments.index', [
            'comments' => Comment::latest()
        ]);
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
            'content' => 'required|min:5|max:255',
            'tags' => 'min:2|max:50',
        ]);

        $comment = new Comment;
        $comment->user_id = auth()->id();
        $comment->chick_id = $request->input('chickId');
        $comment->content = $request->input('content');
        $comment->tags = $request->input('tags');

        $comment->save();

        return redirect()->route('home');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function update(Comment $comment, Request $request)
    {
        $request->validate([
            'content' => 'required|min:5|max:255',
            'tags' => '',
            'chick_id' => ''
        ]);

        $comment->content = $request->input('content');
        $comment->tags = $request->input('tags');
        $comment->chick_id = $request->input('chick_id');
        $comment->save();

        return redirect()->back()->with('message', 'Commentaire mis à jour !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        if (auth()->user()->id == $comment->user_id) {
            $comment->delete();
            return redirect()->back()->with('message', 'Commentaire supprimé !');
        }
        else {
            return redirect()->back()->withErrors(['user_error'], 'Il faut être l\'auteur du commentaire pour le supprimer !');
        }
    }
}

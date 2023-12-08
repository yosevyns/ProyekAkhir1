<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comment = Comment::where('parent_komentar_id', '=',NULL)->get();
        return view('pages.admin.komentar.index', ['comment' => $comment]);

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
            'deskripsi' => 'required',
        ]);
        
        $comment = new Comment ;
        $comment->user_id= Auth::User()->id;
        $comment->deskripsi = $request->deskripsi;
        $comment->save();
        Alert::success('Sukses', 'Komentar berhasil ditambahkan');
        return redirect('comment');   
    }

    public function reply(Request $request, Comment $comment){
        // dd($conversation);
        $request->validate([
            'deskripsi' => 'required',
        ]);
        
        $reply = new comment ;
        $reply->parent_komentar_id = $comment->id;
        $reply->user_id= Auth::User()->id;
        $reply->deskripsi = $request->deskripsi;
        $reply->save();
        Alert::success('Sukses', 'Komentar berhasil dibalas');
        return redirect('comment');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        $comment->delete();
        Alert::success('Sukses', 'Data Terhapus');
        return redirect("comment");
    }
}

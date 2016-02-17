<?php

namespace Admin\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

use \Model\Comment\ModelName as Comment;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comments = Comment::orderBy('id','desc')->get();

        return view('Admin::comment.index',[
            'comments' => $comments,
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        return view('Admin::comment.show',[
            'comment' => $comment,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        return view('Admin::comment.edit',[
            'comment' => $comment,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        $comment->update($request->except('q'));

//        return redirect()->route('admin.comment.show', $comment);
        return redirect()->route('admin.comment.show',$comment)->with('success','true');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */



    public function approve(Request $request)
    {
        $id =$request->commentId;
        $comment = Comment::where('id','=', $id)->first();
        $comment->approved = 1;
        $comment->save();
        return redirect()->route('admin.comment.index');
    }

    public function deny(Request $request)
    {
        $id =$request->commentId;
        $comment = Comment::where('id','=', $id)->first();
        $comment->approved = 0;
        $comment->save();
        return redirect()->route('admin.comment.index');
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();

        return redirect()->route('admin.comment.index');
    }
}

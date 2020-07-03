<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;
use App\Student;
use Auth;


class CommentController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addComment(Request $request, $id){
        $student = Student::find($id);
        $comment = new Comment();
        $comment->comment = $request->comment;
        $comment->student_id = $student->id;
        $comment->user_id = auth::id();
        $comment->save();
        return back(); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    
        $comment = Comment::find($id);
        return view('comment.edit', compact('comment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $comment = Comment::find($id);
        if(auth::id() == $comment->user_id){
            $comment->comment = $request->comment;
            $comment->save();
             $result = redirect('students/'.$comment->student['id']);
        }else{
            $result = "Unauthorize";
        }
        return $result;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function deleteComment($id)
    {
        $comment = Comment::find($id);
        if(auth::id() == $comment->user_id){
            $comment->delete();
            $result = back();
        }else{
            $result = "Cannot delete";
        }
        return $result;
    }
}
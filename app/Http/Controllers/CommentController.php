<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;
use App\Comment;
class CommentController extends Controller
{
    public function store(Request $request,Post $post,User $user){

    	//validate 
    	$this->validate(request(),['comment'=>'required']);
    	//store
        
    	Comment::create(['comment'=> request('comment'),
    		             'post_id'=>$post->id,
    		             'user_id'=>\Auth::user()->id]);
    	/*$comment = new Comment();
    	$comment->comment = $request->input('comment');
    	$comment->post_id = $post->id;
    	$comment->user_id = auth()->user()->id;

    	$comment->save();*/

    	//redirect 
    	return back();

    }
}

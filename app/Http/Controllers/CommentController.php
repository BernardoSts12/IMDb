<?php

namespace App\Http\Controllers;

use App\Models\Comment;

use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, $id){

        $userLog = auth()->check();

        

        if($userLog == true){

            $comment = new Comment;

            $comment->comment=$request->comentario;
    
            $user=auth()->user();
    
            $comment->user_name = $user->name;
            $comment->user_id = $user->id;
            $comment->filme_id = $id;
    
    
            $comment->save();

            return back();
        }else{
            return redirect('login');
        }
        
    
    }

    public function destroy($id)
    {

        Comment::findOrFail($id)->delete();

        return back();
    }
}

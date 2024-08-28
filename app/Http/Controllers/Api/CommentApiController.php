<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comment;

class CommentApiController extends Controller
{
    public function addComment(Request $request)
    {
        // dd($request->all());
        $comment = Comment::create([
            'user_id' => $request->user_id,
            'parent_id' => $request->parent_id,
            'blog_id' => $request->blog_id,
            'comment' => $request->comment,
        ]);
        if($request->parent_id == 0)
        {
            $placement = 'main';
        }else{
            $placement = 'sub';
        }
        return response()->json([
            "msg" =>  'Comment Successfull',
            "placement" =>  $placement,
            "comment" => [
            'id' => $comment->id,
            'parent_id' => $comment->parent_id,
            'comment' => $comment->comment,
            'created_at' => $comment->created_at->diffForHumans(),
            'user' => [
                'name' => $comment->user->name,
                'image' => asset('storage/profile/images/' . $comment->user->image),
            ],
        ],
        ], 200);
    }
}

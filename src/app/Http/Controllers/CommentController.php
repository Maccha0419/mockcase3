<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;


class CommentController extends Controller
{
    public function comment(Request $request, $item_id)
    {
        Comment::create([
            'user_id' => $request->user_id,
            'item_id' => $item_id,
            'comment' => $request->comment,
        ]);
        $comment_number = Comment::where('item_id', $item_id)->count();
        return response()->json([$comment_number]);
    }
}

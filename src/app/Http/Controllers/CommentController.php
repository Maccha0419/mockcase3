<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Http\Requests\CommentRequest;


class CommentController extends Controller
{
    public function comment(CommentRequest $request)
    {
        $item_id = $request->item_id;
        Comment::create([
            'user_id' => $request->user_id,
            'item_id' => $item_id,
            'comment' => $request->comment,
        ]);
        return redirect(route('item', [
            'item_id' => $item_id,
        ]));
    }
}

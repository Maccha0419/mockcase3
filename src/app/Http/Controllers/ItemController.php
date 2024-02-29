<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Like;
use App\Models\Category;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class ItemController extends Controller
{
    public function index($item_id)
    {
        $user = Auth::user();
        $item = Item::with('condition')->where('id', $item_id)->first();
        $categories = Category::whereHas('category_items', function ($query) use ($item_id) {
            $query->where('item_id', $item_id);
        })->get();

        if (empty($user->id)) {
            $defaultLiked = false;
        } else {
            $defaultLiked = Like::where('user_id', $user->id)->where('item_id', $item_id)->first();
            if (!empty($defaultLiked)) {
                $defaultLiked = true;
            } else {
                $defaultLiked = false;
            }
        }

        $like_number = Like::where('item_id', $item_id)->count();
        $comment_number = Comment::where('item_id', $item_id)->count();
        $comments = Comment::with('user.profile')->get();
        return view('item', compact('item','categories', 'defaultLiked','user', 'like_number', 'comment_number', 'comments'));
    }
}
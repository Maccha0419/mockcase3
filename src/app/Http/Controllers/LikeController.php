<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Like;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function like(Request $request, $item_id)
    {
        if (!empty($request->user_id)) {
            Like::create([
                'user_id' => $request->user_id,
                'item_id' => $item_id,
            ]);
        }
        $like_number = Like::where('item_id', $item_id)->count();
        return response()->json([$like_number]);
    }

    public function unlike(Request $request, $item_id)
    {
        if (!empty($request->user_id)) {
            $like = Like::where('user_id', $request->user_id)->where('item_id', $item_id)->first();
            $like->delete();
        }
        $like_number = Like::where('item_id', $item_id)->count();
        return response()->json([$like_number]);
    }
}

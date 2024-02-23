<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use Illuminate\Support\Facades\Auth;

class TopController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $items = Item::get();
        return view('top', compact('user','items'));
    }

    public function mylist(Request $request)
    {
        $mylists = Item::whereHas('likes', function ($query) use ($request) {
            $query->where('user_id', $request->user_id);
        })->get()->toArray();
        return response()->json($mylists);
    }

    public function recommendation()
    {
        $recommendation = Item::get()->toArray();
        return response()->json($recommendation);
    }
}

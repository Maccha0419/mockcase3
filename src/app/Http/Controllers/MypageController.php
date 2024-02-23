<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Profile;
use Illuminate\Support\Facades\Auth;

class MypageController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $user_img = Profile::where('user_id', $user->id)->first()->img_url;
        $my_items = Item::where('user_id', $user->id)->get();
        $sold_items = Item::whereHas('sold_items', function ($query) use ($user) {
            $query->where('user_id', $user->id);
        })->get();
        return view('mypage', compact('user', 'user_img', 'my_items', 'sold_items'));
    }
}

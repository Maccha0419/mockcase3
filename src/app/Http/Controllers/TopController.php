<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class TopController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();
        $items = Item::get();
        return view('top', compact('user','items','keyword'));
    }

    public function search(Request $request)
    {
        $keyword = $request->keyword;
        $user = Auth::user();
        $item = Item::KeywordItemSearch($keyword)->get();
        $category_item = Item::whereHas('category_items.category', function ($query) use ($keyword) {
            $query -> KeywordCategorySearch($keyword);
        })->get();
        $items =  $item->merge($category_item);
        return view('top', compact('user','items','keyword'));
    }

    public function mylist(Request $request)
    {
        $mylists = Item::whereHas('likes', function ($query) use ($request) {
            $query->where('user_id', $request->user_id);
        })->get()->toArray();
        return response()->json($mylists);
    }

    public function recommendation(Request $request)
    {
        dd($request);
        $keyword = $request->keyword;
        if ($keyword) {
            $user = Auth::user();
            $item = Item::KeywordItemSearch($keyword)->get();
            $category_item = Item::whereHas('category_items.category', function ($query) use ($keyword) {
                $query -> KeywordCategorySearch($keyword);
            })->get();
            $recommendation =  $item->merge($category_item)->toArray();
        }
        else {
            $recommendation = Item::get()->toArray();
        }
        return response()->json($recommendation);
    }
}
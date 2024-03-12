<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Category;
use App\Models\Condition;
use App\Models\CategoryItem;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\SellRequest;

class SellController extends Controller
{
    public function index()
    {
        return view('sell');
    }

    public function sell(SellRequest $request)
    {
        $file = $request->file('item_img');
        $dir = 'img/item';
        $file_name = $file->getClientOriginalName();
        $file->storeAs('public/' . $dir, $file_name);

        Category::create([
            'name' => $request->category,
        ]);
        Condition::create([
            'condition' => $request->condition,
        ]);
        Item::create([
            'user_id' => Auth::user()->id,
            'condition_id' => Condition::where('condition', $request->condition)->first()->id,
            'name' => $request->item_name,
            'brand' => $request->brand,
            'price' => $request->price,
            'img_url' => $file_name,
            'description' => $request->description,
        ]);
        CategoryItem::create([
            'item_id' => Category::where('name', $request->category)->first()->id,
            'category_id' => item::first()->id,
        ]);
        return redirect()->route('top');
    }
}

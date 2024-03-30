<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Category;
use App\Models\Condition;
use App\Models\CategoryItem;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\SellRequest;
use Storage;

class SellController extends Controller
{
    public function index()
    {
        return view('sell');
    }

    public function sell(SellRequest $request)
    {
        if ($request->file('item_img')) {
            $file = $request->file('item_img');
            $path = Storage::disk('s3')->putFile('/item', $file, 'public');
            $img = Storage::disk('s3')->url($path);
        }else {
            $img = "https://mockcase3.s3.ap-northeast-1.amazonaws.com/no-image.jpg";
        }
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
            'img_url' => $img,
            'description' => $request->description,
        ]);
        CategoryItem::create([
            'item_id' => item::orderBy('created_at', 'desc')->first()->id,
            'category_id' => Category::where('name', $request->category)->first()->id,
        ]);
        return redirect()->route('top');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\SoldItem;
use Illuminate\Support\Facades\Auth;

class PurchaseController extends Controller
{
    public function index($item_id)
    {
        $item = Item::where('id', $item_id)->first();
        return view('purchase', compact('item'));
    }

    public function purchase(Request $request)
    {
        SoldItem::create([
            'user_id' => Auth::user()->id,
            'item_id' => $request->item_id,
        ]);
        return redirect()->route('top');
    }
}
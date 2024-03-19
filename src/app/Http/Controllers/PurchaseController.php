<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\SoldItem;
use Illuminate\Support\Facades\Auth;
use Stripe\Stripe;
use Stripe\Charge;

class PurchaseController extends Controller
{
    public function index(Request $request, $item_id)
    {
        $item = Item::where('id', $item_id)->first();
        if (!$request->payment_method) {
            $payment_method = 'コンビニ支払い';
        } else {
            $payment_method = $request->payment_method;
        }
        return view('purchase', compact('item', 'payment_method'));
    }

    public function purchase(Request $request)
    {
        if ($request->payment_method === 'クレジットカード') {
            Stripe::setApiKey(env('STRIPE_SECRET'));
            $charge = Charge::create(array(
                'amount' => $request->price,
                'currency' => 'jpy',
                'source' => request()->stripeToken,
            ));
        }
        SoldItem::create([
            'user_id' => Auth::user()->id,
            'item_id' => $request->item_id,
        ]);
        return redirect()->route('top');
    }
}
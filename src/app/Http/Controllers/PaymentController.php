<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class PaymentController extends Controller
{
    public function index($item_id)
    {
        return view('payment', compact('item_id'));
    }
}

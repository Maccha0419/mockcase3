<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Profile;
use App\Http\Requests\ProfileRequest;

class AddressController extends Controller
{
    public function index($item_id)
    {
        return view('address', compact('item_id'));
    }

    public function address_update(ProfileRequest $request, $item_id)
    {
        $profile = Profile::where('user_id', Auth::user()->id)->first();
        if (empty($profile) === false) {
            $profile -> update([
                'postcode' => $request->postcode,
                'address' => $request->address,
                'building' => $request->building,
            ]);
        }else {
            Profile::create([
                'user_id' => Auth::user()->id,
                'postcode' => $request->postcode,
                'address' => $request->address,
                'building' => $request->building,
            ]);
        }
        return redirect()->route('confirm', $item_id);
    }
}
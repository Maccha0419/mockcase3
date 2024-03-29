<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Profile;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ProfileRequest;
use Storage;

class ProfileController extends Controller
{
    public function index()
    {
        return view('profile');
    }

    public function update(ProfileRequest $request)
    {
        $profile = Profile::where('user_id', Auth::user()->id)->first();
        $file = $request->file('user_img');
        if ($file) {
            $dir = 'img/profile';
            $file_name = $file->getClientOriginalName();
            $file->storeAs('public/' . $dir, $file_name);
            Storage::disk('s3')->putFile('/user', $file);
        } else {
            if (!$profile) {
                $file_name = null;
            } else {
                if(!empty($profile->img_url)) {
                    $file_name = null;
                }else {
                    $file_name = $profile->img_url;
                }
            }
        }

        User::where('id', $user = Auth::user()->id)->update([
            'name' => $request->name,
        ]);
        if (!empty($profile)) {
            $profile -> update([
                'img_url' => $file_name,
                'postcode' => $request->postcode,
                'address' => $request->address,
                'building' => $request->building,
            ]);
        }else {
            Profile::create([
                'user_id' => Auth::user()->id,
                'img_url' => $file_name,
                'postcode' => $request->postcode,
                'address' => $request->address,
                'building' => $request->building,
            ]);
        }
        return redirect()->route('mypage');
    }
}

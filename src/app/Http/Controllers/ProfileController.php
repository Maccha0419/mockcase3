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
            $file_name = $file->getClientOriginalName();
            $path = Storage::disk('s3')->putFile('/user', $file, 'public');
            $img = Storage::disk('s3')->url($path);
        } else {
            if (!$profile) {
                $img = "https://mockcase3.s3.ap-northeast-1.amazonaws.com/no-image.jpg";
            } else {
                $img = $profile->img_url;
            }
        }

        User::where('id', $user = Auth::user()->id)->update([
            'name' => $request->name,
        ]);
        if (!empty($profile)) {
            $profile -> update([
                'img_url' => $img,
                'postcode' => $request->postcode,
                'address' => $request->address,
                'building' => $request->building,
            ]);
        }else {
            Profile::create([
                'user_id' => Auth::user()->id,
                'img_url' => $img,
                'postcode' => $request->postcode,
                'address' => $request->address,
                'building' => $request->building,
            ]);
        }
        return redirect()->route('mypage');
    }
}

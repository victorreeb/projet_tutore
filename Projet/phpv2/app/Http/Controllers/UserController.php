<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Auth;
use Intervention\Image\ImageManager;

class UserController extends Controller
{
    //
    public function profile(){
      return view('auth/profile', array('user' => Auth::user()));
    }

    public function update_avatar(Request $request){

    	// Handle the user upload of avatar
    	if($request->hasFile('avatar')){
    		$avatar = $request->file('avatar');
    		$filename = time() . '.' . $avatar->getClientOriginalExtension();
    		// Image::make($avatar)->resize(300, 300)->save( public_path('/uploads/avatars/' . $filename ) );
        $manager = new ImageManager(array('driver' => 'imagick'));
        $manager->make('image.jpg')->fit(500, 500)->save('thumb.jpg');

    		$user = Auth::user();
    		$user->avatar = $filename;
    		$user->save();
    	}
    	return view('auth/profile', array('user' => Auth::user()));
    }
}

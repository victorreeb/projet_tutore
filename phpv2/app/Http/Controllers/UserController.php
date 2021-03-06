<?php


/*
    Some fixes thanks to https://github.com/Intervention/image/issues/125 answers
*/

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Image as Image;


class UserController extends Controller
{

    public function profile(){
      return view('dashboard/profile/index', array('user' => Auth::user()));
    }

    public function update_avatar(Request $request){

    	// Handle the user upload of avatar
    	if($request->hasFile('avatar')){
    		$avatar = $request->file('avatar');
    		$filename = time() . '.' . $avatar->getClientOriginalExtension();
    		Image::make($avatar)->resize(300, 300)->save( public_path('storage/uploads/avatars/' . $filename ) );
    		$user = Auth::user();
    		$user->avatar = $filename;
    		$user->save();
        return redirect()->route('profile')->with('info', 'Avatar changé avec succès !');
    	}
      return view('dashboard/profile/index', array('user' => Auth::user()));
    }
}

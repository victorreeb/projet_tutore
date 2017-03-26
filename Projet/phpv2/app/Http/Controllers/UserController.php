<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Auth;
use Intervention\Image\ImageManager as Image;


class UserController extends Controller
{

    public function profile(){
      return view('auth/profile', array('user' => Auth::user()));
    }

    public function update_avatar(Request $request){

    	// // Handle the user upload of avatar
    	// if($request->hasFile('avatar')){
    	// 	$avatar = $request->file('avatar');
    	// 	$filename = time() . '.' . $avatar->getClientOriginalExtension();
    	// 	$img = Image::make($avatar)->resize(300, 300)->save( public_path('/uploads/avatars/' . $filename ) );
    	// 	$user = Auth::user();
    	// 	$user->avatar = $filename;
    	// 	$user->save();
    	// }
    	// return view('auth/profile', array('user' => Auth::user()));
      $image = new Image();
      $this->validate($request, [
          'title' => 'required',
          'image' => 'required'
      ]);
      $image->title = $request->title;
      $image->description = $request->description;
      if($request->hasFile('image')) {
          $file = Input::file('image');
          //getting timestamp
          $timestamp = str_replace([' ', ':'], '-', Carbon::now()->toDateTimeString());

          $name = $timestamp. '-' .$file->getClientOriginalName();

          $image->filePath = $name;

          $file->move(public_path().'/images/', $name);
      }
      $image->save();
      return $this->create()->with('success', 'Image Uploaded Successfully');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserGroupe;
use App\Groupe;
use Auth;

class UserGroupeController extends Controller
{
  public function signup($id, Request $request){
    $redirect = request()->redirect;
    $groupe = Groupe::where('id', $id)->first();
    $check_already_signup = UserGroupe::where('id_group', $groupe->id)->where('id_user', Auth::id())->count();
    if($check_already_signup == 0){
      $user_groupe = new UserGroupe;
      $user_groupe->id_group = $groupe->id;
      $user_groupe->id_user = Auth::id();
      $user_groupe->save();
      if($redirect == 'show'){
        return redirect()->route('groupe.show', ['id' => $groupe->id]);
      }
      else{
        return redirect()->route('groupe.index');
      }
    }
    else{
      if($redirect == 'show'){
        return redirect()->route('groupe.show', ['id' => $groupe->id]);
      }
      else{
        return redirect()->route('groupe.index');
      }
    }
  }

  public function signout($id, Request $request){
    $redirect = request()->redirect;
    $groupe = Groupe::where('id', $id)->first();
    $user_groupe = UserGroupe::where('id_group', $groupe->id)->where('id_user', Auth::id())->first();
    if($user_groupe != null){
      $user_groupe->delete();
      if($redirect == 'show'){
        return redirect()->route('groupe.show', ['id' => $groupe->id]);
      }
      else{
        return redirect()->route('groupe.index');
      }
    }
    else{
      if($redirect == 'show'){
        return redirect()->route('groupe.show', ['id' => $groupe->id]);
      }
      else{
        return redirect()->route('groupe.index');
      }
    }
  }
}

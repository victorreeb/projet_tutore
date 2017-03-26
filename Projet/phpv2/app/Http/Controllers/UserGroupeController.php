<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
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

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
      $groupes = Groupe::where('id_teacher', Auth::id())->get();
      foreach ($groupes as $groupe) {
        $groupe->already_signup = UserGroupe::where('id_group', $groupe->id)->where('id_user', Auth::id())->count();
        $groupe->count_members = UserGroupe::where('id_group', $groupe->id)->count();
      }
      return view('profile/groupes/index', ['groupes' => $groupes]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
      return view('profile/groupes/create');
  }

  protected function validator(array $data)
  {
      return Validator::make($data, [
          'name' => 'required|max:255'
      ]);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $validator = $this->validator($request->all());
    if($validator->fails()){
      return redirect()->back()->withErrors($validator->errors());
    }
    $groupe = new Groupe;
    $groupe->name = $request->input('name');
    $groupe->id_teacher = Auth::id();
    $groupe->name_teacher = Auth::user()->name;
    $groupe->save();
    return redirect()->route('profile.groupe.index');
  }

  public function delete($id){
    $groupe = Groupe::where('id', $id)->first();
    $groupe->delete();
    return redirect()->route('profile.groupe.index');
  }

}

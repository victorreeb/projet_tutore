<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\Collection;
use App\UserGroupe;
use App\Groupe;
use Auth;

class UserGroupeController extends Controller
{
  public function signup($id){
    $groupe = Groupe::where('id', $id)->first();
    $check_already_signup = UserGroupe::where('id_group', $groupe->id)->where('id_user', Auth::id())->count();
    if($check_already_signup == 0){
      $user_groupe = new UserGroupe;
      $user_groupe->id_group = $groupe->id;
      $user_groupe->id_user = Auth::id();
      $user_groupe->save();
    }
    return redirect()->back();
  }

  public function signout($id){
    $groupe = Groupe::where('id', $id)->first();
    $user_groupe = UserGroupe::where('id_group', $groupe->id)->where('id_user', Auth::id())->first();
    if(!empty($user_groupe)){
      $user_groupe->delete();
    }
    return redirect()->back();
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Exercise $exercise
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    $exercise = Exercise::where('id', $id)->first();
    if($exercise->id_teacher == Auth::id()){
      return view('dashboard/exercises/show', ['exercise' => $exercise]);
    }
    else{
      return redirect()->back();
    }
  }

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
      if(Auth::user()->type_user == 1 or Auth::user()->type_user == 0){
        $groupes = Groupe::where('id_teacher', Auth::id())->get();
        foreach ($groupes as $groupe) {
          $groupe->already_signup = UserGroupe::where('id_group', $groupe->id)->where('id_user', Auth::id())->count();
          $groupe->count_members = UserGroupe::where('id_group', $groupe->id)->count();
        }
        return view('dashboard/groupes/index', ['groupes' => $groupes]);
      }
      elseif (Auth::user()->type_user == 2) {
          $user_groupes = UserGroupe::where('id_user', Auth::id())->get();
          $groupes = new Collection;
          if(!empty($user_groupes)){
            foreach ($user_groupes as $user_groupe) {
              $groupes->push(Groupe::where('id', $user_groupe->id_group)->first());
            }
          }
          return view('dashboard/groupes/index', ['groupes' => $groupes]);
      }
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
      return view('dashboard/groupes/create');
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
    return redirect()->route('dashboard.groupe.index');
  }

  public function delete($id){
    $groupe = Groupe::where('id', $id)->first();
    $groupe->delete();
    return redirect()->route('dashboard.groupe.index');
  }

}

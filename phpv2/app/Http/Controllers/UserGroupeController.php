<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\Collection;
use App\UserGroupe;
use App\Groupe;
use App\Exercise;
use App\User;
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
    $groupe = Groupe::where('id', $id)->first();
    if($groupe->id_teacher == Auth::id()){
      $users_groupe = UserGroupe::where('id_group', $groupe->id)->get();
      $users = new Collection;
      if(!empty($users_groupe)){
        foreach ($users_groupe as $user_groupe) {
          $users->push(User::where('id', $user_groupe->id_user)->first());
        }
      }
      $groupe->already_signup = UserGroupe::where('id_group', $groupe->id)->where('id_user', Auth::id())->count();
      $groupe->count_members = UserGroupe::where('id_group', $groupe->id)->count();
      return view('dashboard/groupes/show', ['groupe' => $groupe, 'participants' => $users]);
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
          if($user_groupes){
            $groupes = new Collection;
            foreach ($user_groupes as $user_groupe) {
              $groupe = Groupe::where('id', $user_groupe->id_group)->first();
              if($groupe){
                $groupes->push($groupe);
              }
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
    $groupe->name_teacher = Auth::user()->pseudo;
    $groupe->save();
    return redirect()->route('dashboard.groupe.index')->with('success', 'Groupe créé avec succès !');
  }

  public function delete($id){
    $groupe = Groupe::where('id', $id)->first();
    $groupe->delete();
    return redirect()->route('dashboard.groupe.index');
  }

  public function add_users($id, Request $request){
    $validator = $this->validator($request->all());
    if($validator->fails()){
      return redirect()->back()->withErrors($validator->errors());
    }
    $groupe = Groupe::where('id', $id)->first();
    $user = User::where('pseudo', $request->input('name'))->first();
    if($user){
      $user_already_added = UserGroupe::where('id_group', $groupe->id)->where('id_user', $user->id)->first();
      if($user_already_added){
        $validator->errors()->add('name', 'Utilisateur déjà ajouté');
        return redirect()->back()->withErrors($validator->errors());
      }
      $user_groupe = new UserGroupe;
      $user_groupe->id_group = $groupe->id;
      $user_groupe->id_user = $user->id;
      $user_groupe->save();
      return redirect()->route('dashboard.groupe.show', ['id' => $id]);
    }
    else{
      $validator->errors()->add('name', 'Utilisateur introuvable');
      return redirect()->back()->withErrors($validator->errors());
    }
  }

  public function delete_users($id, $user){
    $user = User::where('pseudo', $user)->first();
    $user_groupe = UserGroupe::where('id_group', $id)->where('id_user', $user->id)->first();
    $user_groupe->delete();
    return redirect()->back();
  }

}

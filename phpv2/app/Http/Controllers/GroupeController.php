<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\Collection;
use App\UserGroupe;
use App\Groupe;
use App\User;
use Auth;

class GroupeController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
      $groupes = Groupe::all();
      foreach ($groupes as $groupe) {
        $groupe->already_signup = UserGroupe::where('id_group', $groupe->id)->where('id_user', Auth::id())->count();
        $groupe->count_members = UserGroupe::where('id_group', $groupe->id)->count();
      }
      return view('groupes/index', ['groupes' => $groupes]);
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Groupe $groupe
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    $groupe = Groupe::where('id', $id)->first();
    $user = User::where('id', $groupe->id_teacher)->first();
    $groupe->already_signup = UserGroupe::where('id_group', $groupe->id)->where('id_user', Auth::id())->count();
    $groupe->count_members = UserGroupe::where('id_group', $groupe->id)->count();
    $users_groupe = UserGroupe::where('id_group', $groupe->id)->get();
    $users = new Collection;
    if(!empty($users_groupe)){
      foreach ($users_groupe as $user_groupe) {
        $users->push(User::where('id', $user_groupe->id_user)->first());
      }
    }
    return view('groupes/show', ['groupe' => $groupe, 'participants' => $users, 'user' => $user]);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Groupe $groupe
   * @return \Illuminate\Http\Response
   */
  public function edit(Groupe $groupe)
  {
      //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request $request
   * @param  \App\Groupe $groupe
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Groupe $groupe)
  {
      //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Groupe $groupe
   * @return \Illuminate\Http\Response
   */
  public function destroy(Groupe $groupe)
  {
      //
  }

}

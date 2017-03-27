<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Groupe;
use App\UserGroupe;
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
    $groupe->already_signup = UserGroupe::where('id_group', $groupe->id)->where('id_user', Auth::id())->count();
    $groupe->count_members = UserGroupe::where('id_group', $groupe->id)->count();
    return view('groupes/show', ['groupe' => $groupe]);
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

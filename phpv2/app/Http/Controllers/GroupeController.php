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
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
      return view('groupes/create');
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
    $user = Auth::user();
    $groupe = new Groupe;
    $groupe->name = $request->input('name');
    $groupe->id_teacher = $user->id;
    $groupe->name_teacher = $user->pseudo;
    $groupe->save();
    return redirect()->route('groupe.show', ['id' => $groupe->id]);
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

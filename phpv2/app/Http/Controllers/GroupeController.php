<?php

namespace App\Http\Controllers;

use App\Exercise;
use App\ExercisesGroupe;
use App\Groupe;
use App\User;
use App\UserGroupe;
use Auth;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

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
        $exercises_groupe = ExercisesGroupe::where('id_groupe', $groupe->id)->get();
        $exercises = [];
        $exercises_simplified = [];
        foreach ($exercises_groupe as $exercise) {
            $exercises[] = Exercise::where('id', $exercise->id_exercice)->get();
        }
        foreach ($exercises as $exercise) {
            $exercises_simplified [] = $exercise->all();
        }

        //dd($exercises_simplified);

        $users = new Collection;
        if (!empty($users_groupe)) {
            foreach ($users_groupe as $user_groupe) {
                $users->push(User::where('id', $user_groupe->id_user)->first());
            }
        }
        return view('groupes/show', ['groupe' => $groupe, 'participants' => $users, 'user' => $user, 'exercises' => $exercises_simplified]);
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

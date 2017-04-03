<?php

namespace App\Http\Controllers;

use App\Exercise;
use App\ExercisesGroupe;
use App\Groupe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\Collection;


class ExercisesGroupeController extends Controller
{

    public function show($id)
    {
      $groupe = Groupe::where('id', $id)->first();
      $exercises_user = Exercise::where('id_teacher', Auth::user()->id)->get();
      $exercises_groupe = ExercisesGroupe::where('id_groupe', $id)->get();
      $ban_tab = [];
      if (!$exercises_groupe->isEmpty()) {
        $exercises = new Collection;
        foreach ($exercises_groupe as $exercise_groupe) {
          foreach ($exercises_user as $exercise) {
            if ($exercise_groupe->id_exercice == $exercise->id) {
              $ban_tab[] = $exercise->id;
            }
            }
        }
        foreach ($exercises_user as $exercise) {
          if (!in_array($exercise->id, $ban_tab)) {
            $exercises->push($exercise);
          }
        }
        return view('exercisesGroupe/show', ['exercises' => $exercises, 'groupe' => $groupe]);
        }

      else {
        return view('exercisesGroupe/show', ['exercises' => $exercises_user, 'groupe' => $groupe]);
      }
    }

    public function delete($id, $id_exercise)
    {
      $groupe = Groupe::where('id', $id)->where('id_teacher', Auth::id())->first();
      $exercice = Exercise::where('id', $id_exercise)->where('id_teacher', Auth::id())->first();
      if($groupe and $exercice){
        $exercice_groupe = ExercisesGroupe::where('id_groupe', $id)->where('id_exercice', $id_exercise)->first();
        $exercice_groupe->delete();
        }
        return redirect()->back();
    }

    public function add_exercises($id, Request $request)
    {
      $validator = $this->validator($request->all());
      if ($validator->fails()) {
        return redirect()->back()->withErrors($validator->errors());
      }
      $groupe = Groupe::where('id', $id)->first();
      $exercices_id = $request->input('exercice');
      foreach ($exercices_id as $exercice_id) {
        $exercice_already_added = ExercisesGroupe::where('id_groupe', $id)->where('id_exercice', $exercice_id)->first();
        if ($exercice_already_added) {
          return redirect()->back();
        }
        $exercise_group = new ExercisesGroupe();
        $exercise_group->id_groupe = $groupe->id;
        $exercise_group->id_exercice = $exercice_id;
        $exercise_group->save();
      }
      return redirect()->route('dashboard.groupe.show', ['id' => $id]);
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'exercice' => ['required']
        ]);
    }

}

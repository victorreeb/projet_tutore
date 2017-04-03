<?php

namespace App\Http\Controllers;

use App\Exercise;
use App\ExercisesGroupe;
use App\Groupe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;


class ExercisesGroupeController extends Controller
{

    public function index()
    {
        $exercises_nofilter = Exercise::where('id_teacher', Auth::user()->id)->get();
        $exercises = [];
        $actual_link = explode('/', $_SERVER['REQUEST_URI']);
        $exercisesGroupe = ExercisesGroupe::where('id_groupe', $actual_link[2])->get();
        $ban_tab = [];
        if (!$exercisesGroupe->isEmpty()) {
            foreach ($exercisesGroupe as $exerciseGroupe) {
                foreach ($exercises_nofilter as $exercise) {
                    if ($exerciseGroupe->id_exercice == $exercise->id) {
                        $ban_tab[] = $exercise->id;
                    }
                }
            }

            foreach ($exercises_nofilter as $exercise) {
                if (!in_array($exercise->id, $ban_tab)) {
                    $exercises[] = $exercise;
                }

            }
        } else {
            foreach ($exercises_nofilter as $exercise) {
                $exercises[] = $exercise;
            }
        }
        return view('exercisesGroupe/index', ['exercises' => $exercises, 'groupeId' => $actual_link[2]]);
    }


    public function show($id)
    {
        //
    }

    public function add_exercises($id, Request $request)
    {
        $validator = $this->validator($request->all());
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
        }

        $groupe = Groupe::where('id', $id)->first();
        $exercices_id = Input::get('exercice');

        foreach ($exercices_id as $exercice_id) {
            $exercice_already_added = ExercisesGroupe::where('id_groupe', $id)
                ->where('id_exercice', $exercice_id)->first();
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

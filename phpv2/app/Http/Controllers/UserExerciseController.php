<?php

namespace App\Http\Controllers;

use App\Exercise;
use App\Test;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserExerciseController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $exercises = Exercise::where('id_teacher', Auth::id())->get();
        return view('dashboard/exercises/index', ['exercises' => $exercises]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard/exercises/create');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'description' => 'required|max:255',
            'astuce' => 'required|max:255',
            'difficulte' => 'required|integer|between:1,5'
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
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
        }
        $exercise = new Exercise;
        $exercise->name = $request->input('name');
        $exercise->description = $request->input('description');
        $exercise->astuce = $request->input('astuce');
        $exercise->difficulte = $request->input('difficulte');
        $exercise->id_teacher = Auth::id();
        $exercise->name_teacher = Auth::user()->name;
        $exercise->save();
        return redirect()->route('test.create', ['id' => $exercise->id])->with('success', 'Exercice créé avec succès !');
    }

    public function delete($id)
    {
        $exercise = Exercise::where('id', $id)->first();
        $tests = Test::where('id_exercise', $id)->get();
        foreach ($tests as $test) {
            $test->delete();
        }
        $exercise->delete();
        return redirect()->route('dashboard.exercise.index');
    }


}

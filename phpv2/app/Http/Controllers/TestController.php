<?php

namespace App\Http\Controllers;

use App\Test;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TestController extends Controller
{

  public function create($id)
  {
      return view('dashboard/exercises/tests/create', ["id_exercise" => $id]);
  }

  protected function validator(array $data)
  {
      return Validator::make($data, [
          'name' => 'required|max:255',
          'description' => 'required|max:255',
          'code' => 'required'
      ]);
  }

  public function store(Request $request, $id)
  {
    $validator = $this->validator($request->all());
    if($validator->fails()){
      return redirect()->back()->withErrors($validator->errors());
    }
    $test = new Test;
    $test->id_exercise = $id;
    $test->name = $request->input('name');
    $test->description = $request->input('description');
    $test->code = $request->input('code');
    $test->save();
    return redirect()->route('dashboard.exercise.index');
  }

}

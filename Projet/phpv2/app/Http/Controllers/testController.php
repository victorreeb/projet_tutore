<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class testController extends Controller
{
  public function getCreate()
  {
      return view('exercises/test');
  }

  /**
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function postCreate(Exercise $exercise, Test $test, Request $request)
  {
    Test::create([
      'name' => $request['nomTest'],
      'description' => $request['descriptionTest'],
      'code' => $request['codeTest'],
    ]);

    return view('exercises/create');
  }

}

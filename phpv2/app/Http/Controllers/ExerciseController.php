<?php

namespace App\Http\Controllers;

use App\Exercise;
use App\Test;
use Exception;
use Illuminate\Http\Request;
use PHPSandbox\PHPSandbox;
use Illuminate\Support\Facades\Validator;
use Tests\Feature\ExerciseTest;

class ExerciseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $exercises = Exercise::all();
        return view('exercises/index', ['exercises' => $exercises]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Exercise $exercise
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $exercise = Exercise::where('id', $id)->first();
        return view('exercises/show', ['exercise' => $exercise]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Exercise $exercise
     * @return \Illuminate\Http\Response
     */
    public function edit(Exercise $exercise)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Exercise $exercise
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Exercise $exercise)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Exercise $exercise
     * @return \Illuminate\Http\Response
     */
    public function destroy(Exercise $exercise)
    {
        //
    }

    public function begin($id)
    {
      $exercise = Exercise::where('id', $id)->first();
      $tests = Test::where('id_exercise', $id)->get();
      return view('exercises/resolve', ['id' => $exercise->id ,'exercise' => $exercise, 'tests' => $tests]);
    }


    public function resolve(Request $request)
    {
        $exercise = Exercise::where('id', $request->route('id'))->first();
        $tests = Test::where('id_exercise', $exercise->id)->get();
        $code = $request->input('code');
        $console = [];
        // exécute code and see synthax errors

        $errors = $this->evaluate($code, $exercise);

        if(isset($errors['validated'])){
          $validated = $errors['validated'];
        }
        else{
          $validated = false;
        }

        if (!empty($errors) && !empty($errors['errors'])) {
            // renvoyer les errors sur le retour console
            $console['errors'] = $errors['errors'];
        } else {
            $console['errors'] = 'aucune erreur n\'a été détecté' . '<br>';
            if($validated == true){
              $console['errors'] .= 'exercice résolu' . '<br>';
            }
        }

        if (!empty($errors) && !empty($errors['exit'])) {
          $console['exit'] = $errors['exit'];
        }

        // problème de synthaxe
        if(!empty($errors) && empty($errors['tests'])){
          return view('exercises/resolve', ['id' => $exercise->id, 'exercise' => $exercise, 'console' => $console, 'tests' => $tests, 'validated' => $validated]);
        }

        // retour sur erreur si validated == false sinon propose de continuer
        return view('exercises/resolve', ['id' => $exercise->id, 'exercise' => $exercise, 'console' => $console, 'tests' => $errors['tests'], 'validated' => $validated]);
    }

    private function evaluate($code, Exercise $exercise)
    {
        //enlève le balisage propre à php
        $errors = '';
        $result = '';
        $content = '';
        $variables = [];
        $code = str_replace("<?php", "", $code);
        try {
            ob_start();
            $sandbox = new PHPSandbox();
            $sandbox->setOption('validate_functions', false);
            $result = $sandbox->execute($code);


            //get all variables executed
            $variables = get_defined_vars();
            $content = ob_get_contents();
            ob_end_clean();
            $variables['content_ob'] = $content;
        } catch (Exception $e) {
          $errors = $e->getMessage();
        }
        if(!empty($errors)){
          return ['errors' => $errors];
        }
        else{
          $test_class = new ExerciseTest();
          $result = $test_class->test($exercise, $variables);
          return ['validated' => $result['validated'], 'tests' => $result['result'], 'exit'=> $content];
        }
    }


}

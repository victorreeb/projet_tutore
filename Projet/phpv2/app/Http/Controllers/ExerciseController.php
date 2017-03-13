<?php

namespace App\Http\Controllers;

use App\Exercise;
use Illuminate\Http\Request;
use ParseError;
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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getCreate()
    {
        return view('exercises/create');
    }
    public function getCreateTest()
    {
        return view('exercises/test');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function postCreate()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Exercise $exercise
     * @return \Illuminate\Http\Response
     */
    public function show(Exercise $exercise)
    {
        //
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

    public function begin(Exercise $exercise)
    {
        return view('exercises/panel_resolve');
    }

    public function resolve(Exercise $exercise, Request $request)
    {
        $code = $request->input('code');
        $console = [];

        // exécute code and see synthax errors

        $errors = $this->evaluate($code, $exercise);

        if (!empty($errors) && !empty($errors['errors'])) {
            // renvoyer les errors sur le retour console
            $console['errors'] = $errors['errors'];
        } else {
            $console['errors'] = 'aucune erreur n\'a été détecté' . '<br>';
        }


        // tests validés
        $console['tests'] = $errors['tests'];

        return view('exercises/panel_resolve', ['console' => $console]);

    }

    private function evaluate($code, $exercise)
    {
        //enlève le balisage propre à php
        $code = str_replace("<?php", "", $code);
        try {
            ob_start();
            eval($code);
            //get all variables executed
            $variables = get_defined_vars();
            $content = ob_get_contents();
            ob_end_clean();
            $variables['content_ob'] = $content;
        } catch (ParseError $e) {
            return ['errors' => $e->getMessage()];
        }
        $test_class = new ExerciseTest();
        $result = $test_class->test($exercise, $variables);
        return ['tests' => $result];
    }


}

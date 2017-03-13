<?php

namespace App\Http\Controllers;

use App\Exercise;
use Illuminate\Http\Request;
use ParseError;

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
        $code = $request->input('myanswer');
        $console = [];

        // exécute code and see synthax errors
        $error = $this->evaluate($code);
        if (!empty($error)) {
            // renvoyer les errors sur le retour console
            $console['errors'] = $error;
        } else {
            $console['errors'] = 'aucune erreur n\'a été détecté';
        }

        return view('exercises/panel_resolve', ['console' => $console]);

    }

    private function evaluate($code)
    {
        try {
            ob_start();
            eval($code);
            $content = ob_get_contents();
            ob_end_clean();
            var_dump($content);
            //tests
        } catch (ParseError $e) {
            return $e->getMessage();
        }
    }


}

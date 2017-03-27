<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Exercise;
use App\Test;
use Exception;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ExerciseTest extends TestCase
{

    public function load(Exercise $exercise)
    {
        return Test::where('id_exercise', $exercise->id)->get();
    }

    public function test(Exercise $exercise, $response){
      $tests = $this->load($exercise);
      $result = [];
      if(!empty($tests)){
        $validated = true;
        foreach($tests as $test) {
          try{
            $test->result = eval($test->code);
          }
          catch(Exception $e){
            $test->result = $e->getMessage();
          }
          if($test->result == null){
            $test->result = 'validé';
          }
          else{
            $validated = false;
          }
          $result[] = $test;
        }
      }
      return ['result' => $result, 'validated' => $validated];

    }
}

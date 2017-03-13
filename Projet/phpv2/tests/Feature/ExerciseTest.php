<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Exercise;
use App\Test;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ExerciseTest extends TestCase
{

    public function load(Exercise $exercise)
    {
        return Test::where('id_exercise', 1)->get();
    }

    public function test(Exercise $exercise, $response){
      $tests = $this->load($exercise);
      $result['tests'] = [];
      if(!empty($tests)){
        foreach($tests as $test) {
          $test->result = eval($test->code);
          $result['tests'][] = $test;
        }
      }
      return $result;

    }
}

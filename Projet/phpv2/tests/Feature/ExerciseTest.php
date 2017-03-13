<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Exercise;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ExerciseTest extends TestCase
{

    public function load(Exercise $exercise)
    {
        // $tests = Test::where('id_exercise', $exercise->id);
        // return $tests;
    }

    public function test(Exercise $exercise, $response){
      // $tests = $this->load($exercise);
      if(!empty($response)){
        $this->assertEquals(1, $response['v']);
        $this->assertEquals(2, $response['w']);

      }
    }
}

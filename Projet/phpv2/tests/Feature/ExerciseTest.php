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
        return   'if(!empty($response["content_ob"])){
            $this->assertEquals("phpv2", $response["content_ob"]);
          }';
    }

    public function test(Exercise $exercise, $response){
      $tests = $this->load($exercise);
      $result['tests'] = [];
      var_dump($tests);
      // foreach($tests as $test) {
        // test1 => $test->name
        $result['tests']['test1'] = eval($tests);
      // }
      var_dump($result);
      return $result;

    }
}

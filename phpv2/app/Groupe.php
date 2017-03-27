<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Groupe extends Model
{

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'name', 'id_teacher'
  ];

}

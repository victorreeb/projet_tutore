<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserGroupe extends Model
{

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'id_groupe', 'id_user'
  ];

}

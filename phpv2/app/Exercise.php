<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exercise extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
      'id_teacher', 'name', 'description', 'astuce', 'difficulte'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    ];
}

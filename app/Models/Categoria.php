<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{

    protected $fillable = [
        'titulo',
    ];

    public $rules = [
      'titulo' => 'required'
    ];

    public $customAttributes = [
        'titulo' => 'Título'
    ];
}

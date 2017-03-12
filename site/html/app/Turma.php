<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Turma extends Model
{
	protected $table = 'turma';
    protected $dates = ['created_at', 'updated_at'];

    /**
    * Relacionamentos
    */

    public function curso()
    {
        return $this->belongsTo('App\Curso','curso_id');
    }
}

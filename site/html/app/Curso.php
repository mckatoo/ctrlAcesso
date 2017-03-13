<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
	protected $table = 'curso';
    protected $dates = ['created_at', 'updated_at'];

    /**
    * Relacionamentos
    */

    public function campus()
    {
        return $this->belongsTo('App\Campus','campus_id');
    }
}

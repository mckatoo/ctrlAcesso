<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{
	protected $table = 'aluno';
    protected $dates = ['created_at', 'updated_at', 'aceite_contrato'];
    protected $fillable   = ['id','nome','matricula','aceite_contrato','entradas','turma_id','created_at','updated_at'];

    /**
    * Relacionamentos
    */

    public function turma()
    {
        return $this->belongsTo('App\Turma','turma_id');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SecretariaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
    	$aluno = \App\Aluno::with('turma')->paginate(10);
    	foreach ($aluno as $a) {
	    	if (filter_var($a->nome,FILTER_SANITIZE_NUMBER_INT) !== '') {
	    		$idIncoerencia = $a->id;
	    		$erro = "Existem incoerências no cadastro com id $a->id.";
	    	}
    	}
    	if (isset($erro)) {
	    	return view('secretaria.index',compact('aluno','idIncoerencia'))->with('erro',$erro);
    	} else {
	    	return view('secretaria.index',compact('aluno','idIncoerencia'));
    	}
    }


    public function pesquisar(Request $request)
    {
    	# code...
    }
}

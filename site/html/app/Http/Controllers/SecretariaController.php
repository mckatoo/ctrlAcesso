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
    	$campus = \App\Campus::get();
    	$curso = \App\Curso::get();
    	$turma = \App\Turma::get();
    	$aluno = \App\Aluno::with('turma')->paginate(10);
    	foreach ($aluno as $a) {
	    	if (filter_var($a->nome,FILTER_SANITIZE_NUMBER_INT) !== '') {
	    		$idIncoerencia = $a->id;
	    		$erro = "Existem incoerências no cadastro com id $a->id.";
	    	}
    	}
    	if (isset($erro)) {
	    	return view('secretaria.index',compact('campus','curso','turma','aluno','idIncoerencia'))->with('erro',$erro);
    	} else {
	    	return view('secretaria.index',compact('campus','curso','turma','aluno','idIncoerencia'));
    	}
    }


    public function configuracoes()
    {
        $campus = \App\Campus::get();
        $curso = \App\Curso::with('campus')->get();
        $turma = \App\Turma::with('curso')->get();
        $usuarios = \App\User::with('tipo')->get();
        $tipoUsers = \App\tipoUser::get();
        return view('configuracoes.index',compact('campus','curso','turma','usuarios','tipoUsers'));
    }


    public function pesquisar(Request $request)
    {
    	# code...
    }
}

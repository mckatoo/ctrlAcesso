<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

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
        $incoerenciaAluno = \App\Aluno::where('nome','REGEXP','[[:digit:]]')->get();
        if (($incoerenciaAluno->count() > 0)or($curso->where('campus_id','=','')->count() > 0)or($turma->where('curso_id','=','')->count() > 0)) {
	    	return view('secretaria.index',compact('campus','curso','turma','aluno','incoerenciaAluno'))->with('erro','Existem incoerências no cadastro. Clique aqui para resolver. Demais incoerências estão listadas em vermelho abaixo.');
        } else {
	    	return view('secretaria.index',compact('campus','curso','turma','aluno'));
        }
    }


    public function configuracoes()
    {
        $campus = \App\Campus::get();
        $curso = \App\Curso::with('campus')->get();
        $turma = \App\Turma::with('curso')->get();
        if (Auth::user()->tipo->tipo == "Administrador") {
            $usuarios = \App\User::with('tipo')->get();
            $tipoUsers = \App\tipoUser::get();
        } else {
            $usuarios = \App\User::with('tipo')->where('tipoUser_id','<>',1)->get();
            $tipoUsers = \App\tipoUser::where('id','<>',1)->get();
        }
        
        if (($curso->where('campus_id','=','')->count() > 0)or($turma->where('curso_id','=','')->count() > 0)) {
            return view('configuracoes.index',compact('campus','curso','turma','usuarios','tipoUsers'))->with('erro','Incoerências para resolver estão em vermelho.');
        } else {
            return view('configuracoes.index',compact('campus','curso','turma','usuarios','tipoUsers'));
        }
    }


    public function pesquisar(Request $request)
    {
    	# code...
    }
}

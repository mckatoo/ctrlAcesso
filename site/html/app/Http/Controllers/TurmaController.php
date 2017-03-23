<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TurmaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
    	# code...
    }


    public function pesquisar(Request $request)
    {
    	dd($request->all());
    }


    public function salvar(Request $request)
    {
        if ($request->id == '') {
            $turma = new \App\Turma();
            $sucesso = 'Turma cadastrada com sucesso.';
        } else {
            $turma = \App\Turma::find($request->id);
            $sucesso = 'Turma atualizada com sucesso.';
        }
        $turma->turma = $request->turma;
        $turma->curso_id = $request->curso;
        $turma->save();
        
        return back()->with('sucesso',$sucesso);
    }


    public function apagar(Request $request)
    {
        if (\App\Aluno::where('turma_id','=',$request->id)->count() > 0) {
            return back()->with('erro','A tabela Aluno depende deste Turma!');
        } else {
            \App\Turma::find($request->id)->delete();
            return back()->with('sucesso','Registro apagado com sucesso!');
        }
        
    }
}

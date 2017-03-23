<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AlunoController extends Controller
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
    	if ($request->id !== "") {
            $aluno = \App\Aluno::find($request->id)->first();
            $msg = 'Registro atualizado com sucesso!';
        } else {
            $aluno = new \App\Aluno();
            $msg = 'Registro salvo com sucesso!';
        }

        if ($request->campus !== "") {
        	$curso = \App\Curso::find($request->curso)->first();
        	$curso->campus_id = $request->campus;
        	$curso->save();
        }

        $aluno->nome = $request->nome;
        $aluno->matricula = $request->matricula;
        $aluno->turma_id = $request->turma;
        $aluno->aceite_contrato = date('Y-m-d H:i:s',strtotime($request->aceite));
        $aluno->entradas = $request->entradas;
        $aluno->save();
        return back()->with('sucesso',$msg);
    }


    public function apagar(Request $request)
    {
        \App\Aluno::find($request->idApagar)->delete();
        return back()->with('sucesso','Aluno excluido com sucesso!');
    }
}

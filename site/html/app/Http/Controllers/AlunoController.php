<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DateTime;

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
            $aluno = \App\Aluno::find($request->id);
            $msg = 'Registro atualizado com sucesso!';
        } else {
            $aluno = new \App\Aluno();
            $msg = 'Registro salvo com sucesso!';
        }

        if ($request->campus !== "") {
        	$curso = \App\Curso::find($request->curso);
        	$curso->campus_id = $request->campus;
        	$curso->save();
        }

        $aluno->nome = $request->nome;
        $aluno->matricula = $request->matricula;
        $aluno->turma_id = $request->turma;
        $aluno->aceite_contrato = DateTime::createFromFormat('d/m/Y', $request->aceite);
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

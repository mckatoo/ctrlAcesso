<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AlunoController extends Controller
{
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
}

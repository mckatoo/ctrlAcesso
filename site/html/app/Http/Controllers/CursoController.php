<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CursoController extends Controller
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
            $curso = new \App\Curso();
            $sucesso = 'Curso cadastrado com sucesso.';
        } else {
            $curso = \App\Curso::find($request->id);
            $sucesso = 'Curso atualizado com sucesso.';
        }
        $curso->curso = $request->curso;
        $curso->campus_id = $request->campus;
        $curso->save();
        
        return back()->with('sucesso',$sucesso);
    }


    public function apagar(Request $request)
    {
        if (\App\Turma::where('curso_id','=',$request->id)->count() > 0) {
            return back()->with('erro','A tabela Turma depende deste Curso!');
        } else {
            \App\Curso::find($request->id)->delete();
            return back()->with('sucesso','Registro apagado com sucesso!');
        }
        
    }
}

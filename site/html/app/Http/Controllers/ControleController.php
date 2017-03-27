<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ControleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $aluno = \App\Aluno::with('turma');
        $count = $aluno->count();
        if ($count > 5) {
            $aluno = $aluno->orderBy('nome','asc')->paginate(5);
        }
        
        return view('controle.index',compact('aluno','count'));
    }

    public function liberar(Request $request)
    {
        $aluno = \App\Aluno::find($request->id);
        $aluno->entradas = $aluno->entradas + 1;
        $aluno->save();
        return back()->with('sucesso',"Passagem liberarda para $aluno->nome.");
    }

    public function pesquisar(Request $request)
    {
        $count = 0;
        $aluno = \App\Aluno::join('turma','turma_id','=','turma.id')
            ->join('curso','curso_id','=','curso.id')
            ->where('nome','like',"%$request->pesquisar%")
            ->orWhere('matricula','like',"%$request->pesquisar%")
            ->orWhere('curso','like',"%$request->pesquisar%");
        $count = $aluno->count();
        
        if ($count > 5) {
            $aluno = $aluno->orderBy('nome','asc')->paginate(5);
        }else{
            $aluno = $aluno->orderBy('nome','asc')->get();
        }

        return view('controle.index',compact('aluno','count'));
    }
}

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
    	dd($request->all());
    }
}

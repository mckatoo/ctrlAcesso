<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CampusController extends Controller
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
    	$this->validate($request, [
	        'campus' => 'required|unique:campus|max:255',
	    ]);

	    $campus = new \App\Campus();
	    $campus->campus = $request->campus;
	    $campus->save();

	    return back()->with('sucesso','Campus cadastrado com sucesso!');
    }


    public function apagar(Request $request)
    {
    	\App\Campus::find($request->id)->delete();
    	return back()->with('sucesso','Campus apagado com sucesso!');
    }
}

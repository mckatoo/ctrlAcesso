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
	        'campus' => 'bail|required|max:50',
	    ]);

        if (\App\Campus::where('campus','like','%'.$request->campus.'%')->count() > 0) {
            return back()->with('erro',"Campus $request->campus já existe!");
        }

        return \App\Campus::where('campus','like',$request->campus)->count();

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

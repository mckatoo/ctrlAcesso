<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\ExcelServiceProvider;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
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
        return view('home');
    }


    public function importar(Request $request)
    {
        $file = $request->arquivo;
        $localArmazem = storage_path().'/xls/';
        $file->move($localArmazem,$file->getClientOriginalName());
        $arquivo = $localArmazem.$file->getClientOriginalName();
        // dd($arquivo);
        // $filename = this->doSomethingLikeUpload($arquivo);

        Excel::load($file, function($reader) {
            
        });

        // return back();
    }
}

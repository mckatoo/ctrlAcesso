<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

        $ignore = [';'];

        $txtArray = str_replace($ignore, '', file($arquivo));

        if (($handle = fopen($arquivo, "r")) !== FALSE) {
            while (($data = fgetcsv($handle, 0, ",")) !== FALSE) {
                foreach ($data as $line) {
                    $l1 = str_replace($ignore, '', $line);

                    if ($l1 !== "") {
                    // CAMPUS
                        if (stripos($l1, 'campus:') !== false) {
                            $campus = substr($l1,stripos($l1, 'CAMPUS:') ,stripos($l1, 'SÉRIE:'));
                            $campus = str_replace('CAMPUS: ', '', $campus);
                        }
                        
                    //CURSO
                        if (stripos($l1, 'curso:') !== false) {
                            $curso = substr($l1,stripos($l1, 'CURSO:') ,stripos($l1, 'TURMA:'));
                            $curso = str_replace('CURSO: ', '', $curso);
                        }
                        
                    //TURMA
                        if (stripos($l1, 'turma:') !== false) {
                            $turma = substr($l1,stripos($l1, 'TURMA:'));
                            $turma = str_replace('TURMA: ', '', $turma);
                        }
                        
                    //NOME
                        if ((substr($l1, -4)=='2016') or (substr($l1, -4)=='2017')) {
                            $numeros = $l1 + 0;
                            $nome = substr(str_replace($numeros, '', $l1), 0, -10);
                        }
                        
                    //MATRICULA
                        if ((substr($l1, -4)=='2016') or (substr($l1, -4)=='2017')) {
                            $matricula = $l1 + 0;
                        }
                        
                    //ACEITE
                        if ((substr($l1, -4)=='2016') or (substr($l1, -4)=='2017')) {
                            $aceite = substr($l1, -10);
                        }
                    }
                }
            }
        fclose($handle);
        }
    }
}

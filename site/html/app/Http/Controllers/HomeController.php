<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DateTime;

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

        static $campusCSV, $cursoCSV, $turmaCSV, $nomeCSV, $matriculaCSV, $aceiteCSV;
        static $campus, $curso, $turma, $nome, $matricula, $aceite;

        $ignore = [';'];

        $txtArray = str_replace($ignore, '', file($arquivo));

        if (($handle = fopen($arquivo, "r")) !== FALSE) {
            \DB::table('aluno')->delete();
            \DB::table('turma')->delete();
            \DB::table('curso')->delete();
            \DB::table('campus')->delete();

            $c = 0;
            while (($data = fgetcsv($handle, 0, ",")) !== FALSE) {
                foreach ($data as $line) {
                    $l1 = str_replace($ignore, '', $line);
                    if ($l1 !== "") {
                    //CURSO
                        if (stripos($l1, 'curso:') !== false) {
                            $c = 0;
                            $cursoCSV = substr($l1,stripos($l1, 'CURSO:') ,stripos($l1, 'TURMA:'));
                            $cursoCSV = utf8_encode(str_replace('CURSO: ', '', $cursoCSV));

                            if (($cursoCSV != "") and (\App\Curso::where('curso',$cursoCSV)->count() == 0)) {
                                $curso = new \App\Curso();
                                $curso->curso = $cursoCSV;
                                if (\App\Campus::where('campus',$campusCSV)->count() != 0) {
                                    $curso->campus_id = \App\Campus::where('campus',$campusCSV)->first()->id;
                                }
                                $curso->save();
                            }
                            // echo "</div>";
                            // echo "<div style= 'border: solid 1px black; margin-bottom: 10px;'>";
                            // echo "$cursoCSV -----------------";
                        }
                    
                    //TURMA
                        if (stripos($l1, 'turma:') !== false) {
                            $turmaCSV = substr($l1,stripos($l1, 'TURMA:'));
                            $turmaCSV = utf8_encode(str_replace('TURMA: ', '', $turmaCSV));

                            if (($turmaCSV != "") and (\App\Turma::where('turma',$turmaCSV)->count() == 0)) {
                                $turma = new \App\Turma();
                                $turma->turma = $turmaCSV;
                                if (\App\Curso::where('curso',$cursoCSV)->count() != 0) {
                                    $turma->curso_id = \App\Curso::where('curso',$cursoCSV)->first()->id;
                                }
                                $turma->save();
                            }
                            // echo "$turmaCSV <br>";
                        }
                    
                    // CAMPUS
                        if (stripos($l1, 'campus:') !== false) {
                            $campusCSV = utf8_encode(substr($l1,stripos($l1, 'CAMPUS:') ,stripos($l1, utf8_decode('SÉRIE:'))));
                            $campusCSV = str_replace('CAMPUS: ', '', $campusCSV);


                            if (($campusCSV != "") and (\App\Campus::where('campus','=',$campusCSV)->count() == 0)) {
                                $campus = new \App\Campus();
                                $campus->campus = $campusCSV;
                                $campus->save();
                            }
                            // echo "$campusCSV <br>";
                        }
                    
                    //MATRICULA
                        if ((substr($l1, -4)=='2016') or (substr($l1, -4)=='2017')) {
                            $c ++;
                            $matricula = (int) $l1;
                            $matriculaCSV = utf8_encode(substr($matricula, -11));

                            if (($matriculaCSV != "") and (\App\Aluno::where('matricula',$matriculaCSV)->count() == 0)) {
                                $aluno = new \App\Aluno();
                                $aluno->matricula = $matriculaCSV;
                                if (\App\Turma::where('turma',$turmaCSV)->count() != 0) {
                                    $aluno->turma_id = \App\Turma::where('turma',$turmaCSV)->first()->id;
                                }
                            }

                            // echo "$matriculaCSV -----------------";
                        }
                    
                    //NOME
                        if ((substr($l1, -4)=='2016') or (substr($l1, -4)=='2017')) {
                            $numeros = (int) $l1;
                            $nomeCSV = utf8_encode(substr(str_replace($numeros, '', $l1), 0, -10));

                            $aluno->nome = $nomeCSV;

                            // echo "$nomeCSV -----------------";
                        }
                    
                    //ACEITE
                        if ((substr($l1, -4)=='2016') or (substr($l1, -4)=='2017')) {
                            $aceiteCSV = utf8_encode(substr($l1, -10));

                            $aluno->aceite_contrato = DateTime::createFromFormat('d/m/Y', $aceiteCSV);
                            $aluno->save();

                            // echo "$aceiteCSV <br>";
                        }
                    }
                }
            }
        fclose($handle);
        }

    return back()->with('sucesso','Arquivo importado com sucesso!');
    }


    public function updateUser(Request $request)
    {
        if ($request->id != '') {
            $user = \App\User::find($request->id);
            $user->name = $request->name;
            $user->email = $request->email;
            $user->tipoUser_id = $request->tipo;
            if ($request->password != '') {
                $user->password = bcrypt($request->password);
            }
            $user->save();
            return back()->with('sucesso','Usuário atualizado com sucesso!');
        }
        return back()->with('erro','Falha ao atualizar o usuário!');
    }
}

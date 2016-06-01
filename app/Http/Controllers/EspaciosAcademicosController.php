<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\EspacioAcademico;
use App\PlanEstudio;

class EspaciosAcademicosController extends Controller
{
	/**
	* metodo que lista los planes y espacios academicos registrados en la base de datos
	*/
    public function index()
    {
    	$planes = PlanEstudio::pluck('nombrePlanEstudio','idPlanEstudio');
		return view('admin.espaciosAcademicos.index')->with('planes',$planes);
    }
    
    public function create()
    {
        $planes = PlanEstudio::pluck('nombrePlanEstudio','idPlanEstudio');
        return view('admin.espaciosAcademicos.create')->with('planes',$planes);
    }

    public function edit ($id)
    {
        $espacioAcademico = EspacioAcademico::where('idEspacioAcademico',$id)->first();
        return view('admin.espaciosAcademicos.edit')->with('espacioAcademico',$espacioAcademico);
    }

    public function update(Request $request,$id)
    {
        $espacioAcademico = EspacioAcademico::where('idEspacioAcademico',$id)->first();
        $espacioAcademico->nombre = $request->nombre;
        $espacioAcademico->save();
        return redirect()->route('espaciosAcademicos.index');
    }

    public function destroy($id)
    {
        $espacioAcademico = EspacioAcademico::where('idEspacioAcademico',$id)->first();
        $espacioAcademico->delete();
        //Flash::error('Se elimino papu');
        return redirect()->route('espaciosAcademicos.index');
    }

    public function store(Request $request)
    {
        $espacioAcademico = new EspacioAcademico();
        $espacioAcademico->nombre = $request->nombre;
        $espacioAcademico->Semestre_idSemestre = $request->idSemestre;

        $espacioAcademico->save();

        $planes = PlanEstudio::pluck('nombrePlanEstudio','idPlanEstudio');
        return view('admin.espaciosAcademicos.index')->with('planes',$planes);
    }
}
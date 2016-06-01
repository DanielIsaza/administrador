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
    	$espacios = null;
    	$array = array('planes'=>$planes,'espacios'=>$espacios);
		return view('admin.espaciosAcademicos.index')->with('array',$array);
    }
    /**
    * metodo que lista los espacios academicos del semestre seleccionado
    */
    public function lista($id)
    {
    	$planes = PlanEstudio::pluck('nombrePlanEstudio','idPlanEstudio');
    	$espacios = EspacioAcademico::where('Semestre_idSemestre',$id)->pluck('nombre','idEspacioAcademico','Semestre_idSemestre');
    	$array = array('planes'=>$planes,'espacios'=>$espacios);
    	dd("nunca");
		return view('admin.espaciosAcademicos.lista')->with('array',$array);
    }

    public function edit ($id)
    {
        $espacioAcademico = EspacioAcademico::where('idEspacioAcademico',$id)->first();
        return view('admin.espaciosAcademicos.edit')->with('espacioAcademico',$espacioAcademico);
    }

    public function update($id)
    {

    }
}
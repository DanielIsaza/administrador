<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\PlanEstudio;
use App\ReporteGrupo;
use App\PeriodoAcademico;

class ReporteGrupoController extends Controller
{
	/**
	* metodo que retorna la vista con la informacion correspondiente
	*/
    public function index()
	{
		$planes = PlanEstudio::pluck('nombrePlanEstudio','idPlanEstudio');
		return view('admin.reportes.grupo')->with('planes',$planes);
	}
	/**
	* metodo que genera el reporte por grupo
	**/
	public function store(Request $request)
	{
        $periodo = PeriodoAcademico::select('id')->get()->max('id');
		$reporte = new ReporteGrupo();
		$reporte->iniciar();
		$pdf = $reporte->generarReporte($request->idGrupo,$periodo);
		$reporte->descargar('Reporte');
	}
}

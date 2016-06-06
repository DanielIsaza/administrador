<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\PlanEstudio;
use App\ReporteGrupo;
use App\PeriodoAcademico;
use App\Grupo;

class ReporteEspacioAcademicoController extends Controller
{
	/**
	* metodo que retorna la vista con la informacion correspondiente
	*/
	public function index()
	{
		$planes = PlanEstudio::pluck('nombrePlanEstudio','idPlanEstudio');
		return view('admin.reportes.espacio')->with('planes',$planes);
	}
	/**
	* metodo que genera el reporte por grupo
	**/
	public function store(Request $request)
	{
		$periodo = PeriodoAcademico::select('id')->get()->max('id');
		$grupos = Grupo::where('EspacioAcademico_idEspacioAcademico',$request->idEspacioAcademico)->get();
		
		if(count($grupos)>0)	
		{
			$reporte = new ReporteGrupo();
			$reporte->iniciar();
			for($i=0;$i<count($grupos);$i++)
			{
				$reporte->generarReporte($grupos[$i]['idGrupo'],$periodo);
			}

			$pdf = $reporte->getPDF();

			if(!is_null($pdf))
			{
				$reporte->descargar('Reporte_Por_Espacio_Academico');
			}
		}
	}
}

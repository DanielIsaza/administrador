<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Semestre;
use App\ReporteGrupo;
use App\EspacioAcademico;
use App\PeriodoAcademico;
use App\Grupo;

class ReporteCompletoController extends Controller
{
    public function index()
	{
		return view('admin.reportes.completo');
	}
	
	public function store(Request $request)
	{
		$periodo = PeriodoAcademico::select('id')->get()->max('id');
		$reportePlan1 = new ReporteGrupo();
		$reportePlan1->iniciar();
		$pdf= $reportePlan1->getPDF();
		$semestres1 = Semestre::where('PlanEstudio_idPlanEstudio',1)->get();

		for($i=5;$i< count($semestres1);$i++)
		{
			$espacios = EspacioAcademico::where('Semestre_idSemestre',$semestres1[$i]['idSemestre'])->get();
			$pdf->setTitulo(utf8_decode($semestres1[$i]['nombreSemestre']));
			for($j=0;$j<count($espacios);$j++)
			{
				$this->grupo($espacios[$j]['idEspacioAcademico'],$reportePlan1,$periodo);
			}
		}

		$semestres2 = Semestre::where('PlanEstudio_idPlanEstudio',2)->get();
		for($i=0;$i< count($semestres2);$i++)
		{
			$espacios = EspacioAcademico::where('Semestre_idSemestre',$semestres2[$i]['idSemestre'])->get();
			$pdf->setTitulo(utf8_decode($semestres2[$i]['nombreSemestre']));
			for($j=0;$j<count($espacios);$j++)
			{
				$this->grupo($espacios[$j]['idEspacioAcademico'],$reportePlan1,$periodo);
			}
		}

		$reportePlan1->descargar('Reporte_Por_Programa');
	}

	public function grupo($idEspacio, $reporte,$periodo)
	{
		$grupos = Grupo::where('EspacioAcademico_idEspacioAcademico',$idEspacio)->get();
		
		if(count($grupos)>0)	
		{
			for($i=0;$i<count($grupos);$i++)
			{
				$reporte->generarReporte($grupos[$i]['idGrupo'],$periodo);
			}
		}
	}
}

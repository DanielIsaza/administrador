<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Docente;
use App\PDFeval;
use App\ActaConcertacion;
use App\PeriodoAcademico;
use App\ReporteEvaluacion;
use App\Respuesta;
use App\Grupo;

class ReporteEvaluacionController extends Controller
{
    public function index()
	{
		$docentes = Docente::orderBy('nombreDocente','ASC')->pluck('nombreDocente','idDocente');
		return view('admin.reportes.evaluacion')->with('docentes',$docentes);
	}
	public function store(Request $request)
	{
		$periodo = PeriodoAcademico::orderBy('id')->max('id');
		$reporte = new ReporteEvaluacion;
		$reporte->iniciar();
		$reporte->generarReporte($request->idProfesor,$periodo);
		$reporte->descargar();
	}
}

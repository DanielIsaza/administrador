<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Docente;
use App\ReporteDocente;
use App\PeriodoAcademico;

class ReporteProfesorController extends Controller
{
    public function index()
	{
		$docentes = Docente::pluck('nombreDocente','idDocente');
		return view('admin.reportes.profesor')->with('docentes',$docentes);
	}

	public function store(Request $request)
	{	
		$periodo = PeriodoAcademico::select('id')->get()->max('id');
		$reporte = new ReporteDocente();
		$reporte->iniciar();
		$pdf = $reporte->generarReporte($request->idProfesor,$periodo);
		$reporte->descargar('Reporte_docente');
	}
}

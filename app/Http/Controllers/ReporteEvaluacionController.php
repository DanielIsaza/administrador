<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class ReporteEvaluacionController extends Controller
{
    public function index()
	{
		return view('admin.reportes.evaluacion');
	}
	public function store()
	{
		
	}
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class ReporteEspacioAcademicoController extends Controller
{
    public function index()
	{
		return view('admin.reportes.espacio');
	}
	public function store()
	{
		
	}
}

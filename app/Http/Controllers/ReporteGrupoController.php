<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class ReporteGrupoController extends Controller
{
    public function index()
	{
		return view('admin.reportes.grupo');
	}
	public function store()
	{
		
	}
}

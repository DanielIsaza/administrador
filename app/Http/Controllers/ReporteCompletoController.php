<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class ReporteCompletoController extends Controller
{
    public function index()
	{
		return view('admin.reportes.completo');
	}
	
	public function store()
	{

	}
}

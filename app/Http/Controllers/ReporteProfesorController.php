<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class ReporteProfesorController extends Controller
{
    public function index()
	{
		return view('admin.reportes.profesor');
	}
	public function store()
	{
		
	}
}

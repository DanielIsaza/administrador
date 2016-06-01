<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class ReportePeriodoController extends Controller
{
    public function index()
	{
		return view('admin.reportes.periodo');
	}
	public function store()
	{
		
	}
}

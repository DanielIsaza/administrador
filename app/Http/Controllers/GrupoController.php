<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Grupo;
use App\PlanEstudio;

class GrupoController extends Controller
{
    public function index()
	{
		$planes = PlanEstudio::pluck('nombrePlanEstudio','idPlanEstudio');
		return view('admin.grupos.index')->with('planes',$planes);
	}
	public function store()
	{
		
	}
	public function create()
	{
		$planes = PlanEstudio::pluck('nombrePlanEstudio','idPlanEstudio');
		return view('admin.grupos.create')->with('planes',$planes);
	}
}

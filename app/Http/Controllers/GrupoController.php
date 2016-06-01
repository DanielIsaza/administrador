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
    	$espacios = null;
    	$array = array('planes'=>$planes,'espacios'=>$espacios);
		return view('admin.grupos.index')->with('array',$array);
	}
	public function store()
	{
		
	}
	public function create()
	{
		return view('admin.grupos.create');
	}
}

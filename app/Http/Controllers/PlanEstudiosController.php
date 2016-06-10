<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\PlanEstudio;
use App\ProgramaAcademico;

class PlanEstudiosController extends Controller
{
	public function index()
	{
		$planEstudio = PlanEstudio::orderBy('idPlanEstudio','ASC')-> paginate(10);
		return view('admin.planEstudios.index')->with('planEstudios',$planEstudio);
	}

    public function create()
    {
        $programa = ProgramaAcademico::all()->lists('nombrePrograma','idPrograma');
    	return view('admin.planEstudios.create')->with('programa',$programa);
    }

    public function store(Request $request)
    {
    	$planEstudio = new PlanEstudio();
        $num = PlanEstudio::orderBy('idPlanEstudio')->max('idPlanEstudio');
        $num++;
        $planEstudio->idPlanEstudio = $num;
        $planEstudio->nombrePlanEstudio = $request->nombrePlanEstudio;
        $planEstudio->Programa_idPrograma = $request->Programa_idPrograma;
    	$planEstudio->save();
    	return redirect()->route('planEstudios.index');
    }

    public function destroy ($idPlanEstudio)
    {
    	$planEstudio = PlanEstudio::where('idPlanEstudio',$idPlanEstudio)->first();
    	$planEstudio->delete();
    	return redirect()->route('planEstudios.index');
    }

    public function edit ($idPlanEstudio)
    {
    	$planEstudio = PlanEstudio::where('idPlanEstudio',$idPlanEstudio)->first();
    	return view('admin.planEstudios.edit')->with('planEstudio',$planEstudio);
    }

    public function update(Request $request, $id)
    {
    	$planEstudio = PlanEstudio::find($id);
        $planEstudio->idPlanEstudio = $id;
        $planEstudio->nombrePlanEstudio = $request->nombrePlanEstudio;
    	$planEstudio->save();

    	return redirect()->route('planEstudios.index');
    }
}

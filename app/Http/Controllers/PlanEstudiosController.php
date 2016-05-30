<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
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
        $planEstudio->idPlanEstudio = $request->idPlanEstudio;
        $planEstudio->nombrePlanEstudio = $request->nombrePlanEstudio;
        $planEstudio->Programa_idPrograma = $request->Programa_idPrograma;
    	$planEstudio->save();
    	return redirect()->route('planEstudios.index');
    }

    public function destroy ($idPlanEstudio)
    {
    	$planEstudio = PlanEstudio::where('idPlanEstudio',$idPlanEstudio)->first();
    	$planEstudio->delete();
    	//Flash::error('Se elimino papu');
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
    	//$planEstudio->fill($request->all());
        $planEstudio->idPlanEstudio = $request->idPlanEstudio;
        $planEstudio->nombrePlanEstudio = $request->nombrePlanEstudio;
    	$planEstudio->save();

    	return redirect()->route('planEstudios.index');
    }
}

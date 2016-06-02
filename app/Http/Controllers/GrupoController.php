<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Grupo;
use App\PlanEstudio;
use App\Docente;

class GrupoController extends Controller
{
    public function index()
	{
		$planes = PlanEstudio::pluck('nombrePlanEstudio','idPlanEstudio');
		return view('admin.grupos.index')->with('planes',$planes);
	}
	
	public function store(Request $request)
	{
		$numeros = preg_split("/[\s,]+/",$request->numero);
		$grupo;
		for ($i=0; $i < count($numeros) ; $i++) 
		{ 
			$grupo = new Grupo();
			$grupo->EspacioAcademico_idEspacioAcademico = $request->idEspacioAcademico;
			$grupo->NumeroGrupo = $numeros[$i];
			$grupo->Docente_idDocente = $request->Docente_idDocente;

			$grupo->save();
		}

		return redirect()->route('grupos.index');
	}
	
	public function create()
	{
		$docentes = Docente::pluck('nombreDocente','idDocente');
		$planes = PlanEstudio::pluck('nombrePlanEstudio','idPlanEstudio');
		$array = array('docentes' => $docentes, 'planes'=> $planes);
		return view('admin.grupos.create')->with('array',$array);
	}

	public function edit($id)
	{
		$grupo = Grupo::where('idGrupo',$id)->first();
		$docentes = Docente::pluck('nombreDocente','idDocente');
		$array = array('docentes' => $docentes, 'grupo'=>$grupo);
		return view('admin.grupos.edit')->with('array',$array);
	}

	public function destroy($id)
    {
		$grupo = Grupo::where('idGrupo',$id);
    	$grupo->delete();
		return redirect()->route('grupos.index');
    }

    public function update(Request $request,$id)
    {
		$grupo = Grupo::where('idGrupo',$id)->first();
        $grupo->NumeroGrupo = $request->numero;
        $grupo->Docente_idDocente = $request->Docente_idDocente;
        $grupo->save();
        return redirect()->route('grupos.index');
    }
}
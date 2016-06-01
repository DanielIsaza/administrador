<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Docente;
use App\ProgramaAcademico;
use Laracast\Flash\Flash;
use App\Http\Requests\DocenteRequest;

class DocentesController extends Controller
{
	public function index(Request $request)
	{
		$docente = Docente::search($request->name)->orderBy('nombreDocente','ASC')-> paginate(10);
		return view('admin.docente.index')->with('docentes',$docente);
	}

    public function create()
    {
        $programa = ProgramaAcademico::all()->lists('nombrePrograma','idPrograma');
    	return view('admin.docente.create')->with('programa',$programa);
    }

    public function store(DocenteRequest $request)
    {
        $docente = new Docente($request->all());
    	$docente->save();

    	return redirect()->route('docente.index');
    }

    public function destroy ($idDocente)
    {
    	$docente = Docente::where('idDocente',$idDocente)->first();
    	$docente->delete();
    	return redirect()->route('docente.index');
    }

    public function edit ($idDocente)
    {
    	$docente = Docente::where('idDocente',$idDocente)->first();
    	return view('admin.docente.edit')->with('docente',$docente);
    }

    public function update(Request $request, $id)
    {
    	$docente = Docente::find($id);
    	$docente->fill($request->all());
    	$docente->save();
    	return redirect()->route('docente.index');
    }
}
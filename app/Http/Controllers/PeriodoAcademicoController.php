<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\PeriodoAcademico;

class PeriodoAcademicoController extends Controller
{
    public function index()
	{
		$periodos = PeriodoAcademico::orderBy('periodo','ASC')-> paginate(10);
		return view('admin.periodoAcademico.index')->with('periodos',$periodos);
	}

    public function create()
    {
    	return view('admin.periodoAcademico.create');
    }

    public function store(Request $request)
    {
    	$periodo = new PeriodoAcademico();
    	$periodo->id = $request->id;
    	$periodo->periodo = $request->periodo;
    	$periodo->save();

    	return redirect()->route('periodoAcademico.index');
    }

    public function destroy ($id)
    {
    	$periodo = PeriodoAcademico::where('id',$id)->first();
    	$periodo->delete();
    	//Flash::error('Se elimino papu');
    	return redirect()->route('periodoAcademico.index');
    }

    public function edit ($id)
    {
    	$periodo = PeriodoAcademico::where('id',$id)->first();
    	return view('admin.periodoAcademico.edit')->with('periodo',$periodo);
    }

    public function update(Request $request, $id)
    {
    	$periodo = PeriodoAcademico::find($id);
    	$periodo->id = $request->id;
    	$periodo->periodo = $request->periodo;
    	$periodo->save();
    	return redirect()->route('periodoAcademico.index');
    }
}

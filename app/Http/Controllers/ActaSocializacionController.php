<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Enunciado;

class ActaSocializacionController extends Controller
{
    public function index()
    {
    	$enunciados = Enunciado::where('tipoActa',1)->orderBy('numeroPregunta','ASC')-> paginate(10);
		return view('admin.actaSocializacion.index')->with('enunciados',$enunciados);
    }

    public function store(Request $request)
    {
    	$enunciado = new Enunciado();
    	$num = Enunciado::orderBy('tipoActa')->max('numeroPregunta');
    	$num++;
    	$enunciado->NumeroPregunta = $num;
    	$enunciado->enunciado = $request->enunciado;
    	$enunciado->tipoActa = 1;

    	$enunciado->save();
    	return redirect()->route('actaSocializacion.index');
    }

    public function create()
    {
    	return view('admin.actaSocializacion.create');
    }

    public function edit($id)
    {
    	$enunciado = Enunciado::where('numeroPregunta',$id)->first();
    	return view('admin.actaSocializacion.edit')->with('enunciado',$enunciado);
    }

    public function update(Request $request,$id)
    {
    	$enunciado = Enunciado::where('numeroPregunta',$id)->first();
    	$enunciado->enunciado = $request->enunciado;
    	$enunciado->save();
    	return redirect()->route('actaSocializacion.index');
    }

    public function destroy($id)
    {
    	$enunciado = Enunciado::where('numeroPregunta',$id)->first();
    	$enunciado->delete();
    	return redirect()->route('actaSocializacion.index');
    }
}
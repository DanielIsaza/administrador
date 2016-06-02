<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Enunciado;

class ActaConcertacionController extends Controller
{
 	public function index()
 	{
 		$enunciados = Enunciado::where('tipoActa',2)->orderBy('numeroPregunta','ASC')-> paginate(10);
		return view('admin.actaConcertacion.index')->with('enunciados',$enunciados);
 	}

 	public function store(Request $request)
    {
    	$enunciado = new Enunciado();
    	$num = Enunciado::orderBy('tipoActa')->max('numeroPregunta');
    	$num++;
    	$enunciado->NumeroPregunta = $num;
    	$enunciado->enunciado = $request->enunciado;
    	$enunciado->tipoActa = 2;

    	$enunciado->save();
    	return redirect()->route('actaConcertacion.index');
    }

    public function create()
    {
    	return view('admin.actaConcertacion.create');
    }

    public function edit($id)
    {
    	$enunciado = Enunciado::where('numeroPregunta',$id)->first();
    	return view('admin.actaConcertacion.edit')->with('enunciado',$enunciado);
    }

    public function update(Request $request,$id)
    {
    	$enunciado = Enunciado::where('numeroPregunta',$id)->first();
    	$enunciado->enunciado = $request->enunciado;
    	$enunciado->save();
    	return redirect()->route('actaConcertacion.index');
    }

    public function destroy($id)
    {
    	$enunciado = Enunciado::where('numeroPregunta',$id)->first();
    	$enunciado->delete();
    	return redirect()->route('actaConcertacion.index');
    }
}
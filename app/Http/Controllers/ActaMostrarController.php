<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\ActaMostrar;

class ActaMostrarController extends Controller
{
    public function index ()
    {
    	return view('admin.actas.activar');
    }

    public function store(Request $request)
    {
    	$actas = ActaMostrar::all();
    	for($i=0;$i < count($actas);$i++)
    	{
    		if($actas[$i]->id == $request->activar)
    		{
    			$actas[$i]->mostrar = 1;
    		}
    		else
    		{
    			$actas[$i]->mostrar = 0;
    		}
    		$actas[$i]->save();
    	}

    	return redirect()->route('activar.index');
    }
}

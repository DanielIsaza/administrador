<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{
    //
    protected $primaryKey = 'idGrupo';
    protected $table = "grupo";
    protected $filleable = ['idGrupo','EspacioAcademico_idEspacioAcademico','Docente_idDocente','NumeroGrupo'];
    public $timestamps = false;

    public function docente ()
    {
    	return $this->belongsTo('App\Docente');
    }

    public function espacioAcademico()
    {
    	return $this->belongsTo('App\EspacioAcademico');
    }
}

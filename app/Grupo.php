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
    /**
    * metodo que define la relacion del grupo con docente
    */
    public function docente ()
    {
    	return $this->belongsTo('App\Docente');
    }
    /**
    * metodo que define la relacion de grupo con acta de concertacion
    */
    public function actaConcertacion()
    {
        return $this->hasMany('App\ActaConcetacion');
    }
    /*
    * metodo que define la relacion de grupo con espacio espacioAcademico
    */
    public function espacioAcademico()
    {
    	return $this->belongsTo('App\EspacioAcademico');
    }
}

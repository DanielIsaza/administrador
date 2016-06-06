<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EspacioAcademico extends Model
{
    //
    protected $table = "espacioacademico";
    protected $primaryKey = 'idEspacioAcademico';
    protected $filleable = ['idEspacioAcademico','nombre','Semestre_idSemestre'];
    public $timestamps = false;
    /**
	* metodo que define la relacion de espacio academico con grupo
	*/
	public function grupo()
	{
		return $this->hasMany('App\grupo');
	}
    /**
    * metodo que define la relacion de espacio academico con semestre
    */
	public function semestre()
    {
    	return $this->belongsTo('App\Semestre');
    }
}
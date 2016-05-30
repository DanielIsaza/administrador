<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Semestre extends Model
{
    //
    protected $table = "semestre";
    protected $filleable = ['idSemestre','nombreSemestre','PlanEstudio_idPlanEstudio'];
    public $timestamps = false;
    /**
	*
	*/
	public function espacioAcademico()
	{
		return $this->hasMany('App\EspacioAcademico');
	}

	public function planEstudio()
    {
    	return $this->belongsTo('App\PlanEstudio');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlanEstudio extends Model
{
    protected $primaryKey = 'idPlanEstudio';
    public $timestamps = false;
    protected $table = "planestudio";
    protected $filleable = ['idPlanEstudio','nombrePlanEstudio','Programa_idPrograma'];
    /**
	*
	*/
	public function semestre()
	{
		return $this->hasMany('App\Semestre');
	}
	/**
	*
	*/
	public function programaAcademico()
	{
		return $this->belongsTo('App\Semestre');
	}
}

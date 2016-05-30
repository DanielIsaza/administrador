<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProgramaAcademico extends Model
{
	protected $primaryKey = 'idPrograma';
	public $timestamps = false;
	protected $table = "programa";
	protected $fillable = ['idPrograma','codigoPrograma','nombrePrograma','correoPrograma'];
	/**
	*
	*/
	public function docente()
	{
		return $this->hasMany('App\Docente');
	}
	/**
	*
	*/
	public function planEstudios()
	{
		return $this->hasMany('App\PlanEstudio');
	}
}
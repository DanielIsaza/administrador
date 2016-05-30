<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Docente extends Model
{
	protected $primaryKey = 'idDocente';
	public $timestamps = false;
	protected $table = "docente";
	protected $fillable = ['idDocente','cedulaDocente','nombreDocente','correoElectronico','Programa_idPrograma'];
	/**
	*
	*/
	public function grupo()
	{
		return $this->hasMany('App\grupo');
	}

	public function programaacademico()
    {
    	return $this->belongsTo('App\ProgramaAcademico');
    }

    public function scopeSearch($query,$name)
    {
    	return $query->where('nombreDocente','LIKE',"%$name%");
    }
}

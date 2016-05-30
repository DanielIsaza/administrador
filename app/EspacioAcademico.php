<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EspacioAcademico extends Model
{
    //
    protected $table = "espacioacademico";
    protected $filleable = ['idEspacioAcademico','nombre','Semestre_idSemestre'];
    public $timestamps = false;
    /**
	*
	*/
	public function grupo()
	{
		return $this->hasMany('App\grupo');
	}

	public function semestre()
    {
    	return $this->belongsTo('App\Semestre');
    }

    
}

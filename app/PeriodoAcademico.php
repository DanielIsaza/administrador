<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PeriodoAcademico extends Model
{
    //
    protected $table = "periodoacademico";
    protected $filleable = ['id','periodo'];
    public $timestamps = false;

    /**
    * metodo que define la relacion de periodo academico con acta de concertacion
    */
    public function actaConcertacion()
    {
        return $this->hasMany('App\ActaConcetacion');
    }
}
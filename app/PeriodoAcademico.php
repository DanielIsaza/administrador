<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PeriodoAcademico extends Model
{
    //
    protected $table = "periodoacademico";
    protected $filleable = ['id','periodo'];
    public $timestamps = false;

}

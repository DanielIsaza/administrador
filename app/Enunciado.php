<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Enunciado extends Model
{
    //
    protected $table = "enunciado";
    protected $primaryKey = 'numeroPregunta';
    protected $filleable = ['numeroPregunta','enunciado','tipoActa'];
    public $timestamps = false;

}

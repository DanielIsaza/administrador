<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ActaMostrar extends Model
{
    public $timestamps = false;
	protected $table = "actamostrar";
	protected $fillable = ['id','mostrar'];
}

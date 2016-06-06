<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Administrador extends Model
{
    protected $table = "administrador";
    protected $filleable = ['login','password'];
	public $timestamps = false;
}

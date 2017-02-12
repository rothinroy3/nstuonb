<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ups extends Model
{
    protected $fillable = [
    	'firstname','photo',
    ];

    //protected $fillable array('firstname','photo');

    protected $hidden = [
    	'remember_token',
    ];
}

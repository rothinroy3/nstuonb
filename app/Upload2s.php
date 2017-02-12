<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Upload2s extends Model
{
    protected $fillable = [
    	'firstname','dept_id','photo','email',
    ];

   protected $hidden = [
    	'password','remember_token',
    ];
}

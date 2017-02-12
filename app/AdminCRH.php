<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class AdminCRH extends Authenticatable
{
     	
	//protected $guard = "adminStuffs";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username','password','dept_id',
    ];

    protected $hidden = [
        'password','remember_token',
    ];
}

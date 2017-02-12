<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Department extends Authenticatable
{
     	
	//protected $guard = "adminStuffs";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'dept_name',
    ];

    protected $hidden = [
        'dept_id',
    ];
}

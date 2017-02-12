<?php

namespace App\AdminStuff;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class AdminStuff extends Authenticatable
{
     	
	//protected $guard = "adminStuffs";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'stuff_username', 'stuff_password',
    ];
 
    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'stuff_password', 'remember_token',
    ];
}

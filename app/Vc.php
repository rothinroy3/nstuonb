<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\AuthD\User as Authenticatable;

class Vc extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'vc_username', 'vc_password',
    ];
 
    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'vc_password', 'remember_token',
    ];
}

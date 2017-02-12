<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdminTeacher extends Model
{
    protected $fillable = [
        'th_name', 'th_email', 'th_password','th_username','dept_id', 
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'th_password', 'remember_token',
    
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vcnotice extends Model
{
    protected $fillable = [
    	'vc_notice_name','vc_notice_details','vc_notice_content',
    ];
}

<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class VcLogoutController extends Controller
{
    public function logout()
    {
    	 if(Session::has('vc_username') )
    	 {
    	  Session::forget('vc_username');
    	  Session::forget('vc_password');

    	  	return Redirect::to('/admin');
    	 }
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class stuffLogoutController extends Controller
{
    public function logout()
    {
    	 if(Session::has('username') )
    	 {
    	  Session::forget('username');
    	  Session::forget('dept_id');
    	  Session::forget('deptname');

    	  //if($re==true)
    	  //{
    	  	return Redirect::to('/admin');
    	  //}
    	 }
    	 else
    	 {
    	 	return Redirect::to('/admin/loggedin/postNotice');
    	 }
    }
}

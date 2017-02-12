<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class ThLogoutController extends Controller
{
    public function logout()
    {
    	 if(Session::has('th_username') )
    	 {
    	  Session::forget('th_username');
    	  Session::forget('th_dept_id');
    	  Session::forget('th_deptname');

    	  //if($re==true)
    	  //{
    	  	return Redirect::to('/admin');
    	  //}
    	 }
    	 else
    	 {
    	 	return Redirect::to('/admin/loggedin/viewNoticeForTeacher');
    	 }
    }
}

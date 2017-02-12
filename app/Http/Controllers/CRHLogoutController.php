<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class CRHLogoutController extends Controller
{
    public function logout()
    {
    	 if(Session::has('CRH_username'))
    	 {
    	  Session::forget('CRH_username');
    	  Session::forget('CRH_dept_id');
    	  Session::forget('CRH_deptname');
          Session::forget('CRH_dept_type');

    	  //if($re==true)
    	  //{
    	  	return Redirect::to('/admin');
    	  //}
    	 }
    	 else
    	 {
    	 	return Redirect::to('/admin/loggedin/approveNotice');
    	 }
    }
}

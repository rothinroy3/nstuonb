<?php

namespace App\Http\Controllers;
use DB;
//use App\Notice;
use App\Vc;
use Validator;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input; //added by roy

class ChangePasswordVCController extends Controller
{

    public function changePasswordVC()
    {
       
    	return view('mdl-dashboard.vc_index_dashboardChange_password');
    }

    public function changePassword ()
    { 
/*
    	$validation = Validator::make($data1->all(),array(
            'name' => 'required',
            'password' => 'required',
            'new_password' => 'required|min:6',
            ));
        if($validation->fails()) 
        {
           return Redirect::to('/admin/loggedin/ChangePasswordCRH')->withErrors($validation); 
        }
        else{

*/
        	$name = Input::get('username');
    		$oldpass = Input::get('password');
    		$newpass = Input::get('new_password');
    		$confpass = Input::get('conf_password');

        	if(Session::has('vc_username'))
        	{
        		$nameInSesion = Session::get('vc_username');

        		$names = DB::table('vc')
            					->where('vc_username',$nameInSesion)
            					->get();
            		foreach($names as $row)
            		{
            			$id = $row->id;
            			$crhName = $row->vc_username;
            			$crhPass = $row->vc_password;

            			if(md5($oldpass) != $crhPass)
            			{
            				return Redirect::to('/admin/loggedin/vcChangePassword')->with('OldNotmatchVC','Old Password is Invalid');
            			}
            			if(md5($newpass) != md5($confpass))
            			{
            				return Redirect::to('/admin/loggedin/vcChangePassword')->with('NewNotmatchVC','Confirm Password Does not Match');
            			}
            			$newp = md5($newpass);
            			$result = DB::table('vc')
            					->where('id',$id)
            					->update(['vc_username'=> $name,'vc_password'=> $newp,
            						]);
            			if($result == true)
            			{
            			  $destroy = Session::forget('vc_username');
            			  $newSession = Session::put('vc_username',$name);
            			  if(Session::has('vc_username')){

            					return Redirect::action('ChangePasswordVCController@changePasswordVC')->with('approveMessagePassVC','Password or Username Updated');
            				}
			            	else{
			        		return view('mdl-dashboard.vc_index_dashboardChange_password');
			    			}
            			}

            		}

            		
        	}
        	else{
        		return view('mdl-dashboard.vc_index_dashboardChange_password');
    			}
    	}
	}


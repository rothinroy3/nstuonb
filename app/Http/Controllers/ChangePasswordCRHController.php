<?php

namespace App\Http\Controllers;
use DB;
//use App\Notice;
use App\AdminStuff;
use Validator;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input; //added by roy

class ChangePasswordCRHController extends Controller
{

    public function changePasswordCRH()
    {
       
    	return view('mdl-dashboard.crh_index_dashboardChange_password');
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

        	if(Session::has('CRH_username'))
        	{
        		$nameInSesion = Session::get('CRH_username');

        		$names = DB::table('adminCRHs')
            					->where('username',$nameInSesion)
            					->get();
            		foreach($names as $row)
            		{
            			$id = $row->id;
            			$crhName = $row->username;
            			$crhPass = $row->password;

            			if(md5($oldpass) != $crhPass)
            			{
            				return Redirect::to('/admin/loggedin/ChangePasswordCRH')->with('OldNotmatch','Old Password is Invalid');
            			}
            			if(md5($newpass) != md5($confpass))
            			{
            				return Redirect::to('/admin/loggedin/ChangePasswordCRH')->with('NewNotmatch','Confirm Password Does not Match');
            			}
            			$newp = md5($newpass);
            			$result = DB::table('adminCRHs')
            					->where('id',$id)
            					->update(['username'=> $name,'password'=> $newp,
            						]);
            			if($result == true)
            			{
            			  $destroy = Session::forget('CRH_username');
            			  $newSession = Session::put('CRH_username',$name);
            			  if(Session::has('CRH_username')){

            					return Redirect::action('ChangePasswordCRHController@changePasswordCRH')->with('approveMessagePass','Password or Username Updated');
            				}
			            	else{
			        		return view('mdl-dashboard.crh_index_dashboard');
			    			}
            			}

            		}

            		
        	}
        	else{
        		return view('mdl-dashboard.crh_index_dashboard');
    			}
    	}
	}


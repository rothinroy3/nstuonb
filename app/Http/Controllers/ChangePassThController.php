<?php

namespace App\Http\Controllers;
use DB;
//use App\Notice;
use App\AdminTeacher;
use Validator;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input; //added by roy

class ChangePassThController extends Controller
{

    public function thChngPass()
    {
       
    	return view('mdl-dashboard.th_index_changePassword');
    }

    public function thChngPassFinal()
    { 

        	$name = Input::get('th_username');
    		$oldpass = Input::get('th_password');
    		$newpass = Input::get('new_password');
    		$confpass = Input::get('conf_password');

        	if(Session::has('th_username'))
        	{
        		$nameInSesion = Session::get('th_username');

        		$names = DB::table('adminTeachers')
            					->where('th_username',$nameInSesion)
            					->get();
            		foreach($names as $row)
            		{
            			$id = $row->id;
            			$crhName = $row->th_username;
            			$crhPass = $row->th_password;

            			if(md5($oldpass) != $crhPass)
            			{
            				return Redirect::to('/admin/loggedin/changePassForTeacher')->with('OldNotmatchStuff','Old Password is Invalid');
            			}
            			if(md5($newpass) != md5($confpass))
            			{
            				return Redirect::to('/admin/loggedin/changePassForTeacher')->with('NewNotmatchStuff','Confirm Password Does not Match');
            			}
            			$newp = md5($newpass);
            			$result = DB::table('adminTeachers')
            					->where('id',$id)
            					->update(['th_username'=> $name,'th_password'=> $newp,
            						]);
            			if($result == true)
            			{
            			  $destroy = Session::forget('th_username');
            			  $newSession = Session::put('th_username',$name);
            			  if(Session::has('th_username')){

            					return Redirect::action('ChangePassThController@thChngPass')->with('approveMessagePassStuff','Password or Username updated successfully');
            				}
			            	else{
			        		return view('mdl-dashboard.th_index_changePassword');
			    			}
            			}
            		}
        	}
        	else{
        		return view('mdl-dashboard.th_index_changePassword');
    			}
    	}
	}
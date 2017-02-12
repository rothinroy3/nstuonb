<?php

namespace App\Http\Controllers;
use DB;
use App\AdminStuff;
use App\Vc;
use App\AdminCRH;
use App\AdminTeacher;
use Validator;
use Hash;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\AuthD\ThrottlesLogins;
use Illuminate\Foundation\AuthD\AuthenticatesAndRegistersUsers;
use Illuminate\Support\Facades\Input; //added by roy
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\AuthD as Auth;
use Illuminate\Support\Facades\Redirect;
//use Illuminate\Support\Facades\Hash;


class LoginAdminController extends Controller
{
	public function test()
	{
		$type = Input::get('radio');
		$name = Input::get('username');
		$password = Input::get('password');
		$remember = Input::get('remember');
		//$afterHash = Hash::make(Input::get('password'));
		$md5 = md5($_POST['password']);
		$errorMessage = "Invalid Username Or Password!!!";

		//===================Vc Sir Section===================//
		if($type==1)
		{

			$result1 = DB::table('vc')
                    ->where('vc_username',$name)
                    ->where('vc_password',$md5)
                    ->count();

			if($result1>0)
			{  

				Session::put('vc_username', $name);
	            Session::put('vc_password', $password);			
				
				if(isset($remember))
				{
					//$vname = 'vc_username';
					//$min = 1;
					//Cookie::make($vname,$name,$min);
					//Cookie::queue($vname, $name, $min);
					//Cookie::make('vc_password',$password,1);
					//setcookie('vc_username',$name,time()+(10*365*60*60));
					//setcookie('vc_password',$password,time()+(10*365*60*60));
					//return view('mdl-dashboard.vc_index_dashboard');
				}
				else
				{return view('mdl-dashboard.vc_index_dashboard');}
			}
			else
			{
				return view('mdl-dashboard.login-admin',['message1' => $errorMessage]);
				//return Redirect::to('/admin')->with('message1',$errorMessage);
			}
		}



		//=========This is for Chairman/Register/Hall Provost===========//

		if($type==2)
		{
			$result2 = DB::table('adminCRHs')
                    ->where('username',$name)
                    ->count();
            if($result2>0)
               {
            	$crh_dept = DB::table('adminCRHs')
            				->where('username',$name)
                    ->get();
                 foreach($crh_dept as $row2)
                 {
               		if($md5 == $row2->password)
               		{
               		$crh_infos = DB::table('departments')
               					->where('dept_id',$row2->dept_id)
               					->get();
	                	foreach ($crh_infos as $rws2) {
	               				
		               	Session::put('CRH_deptname', $rws2->dept_name);
		               	Session::put('CRH_dept_id', $rws2->dept_id );
                    Session::put('CRH_dept_type', $rws2->dept_type);
		               	Session::put('CRH_username',$name);

	            		return view('mdl-dashboard.crh_index_dashboard');
            			}
            		}
            		else
		            	{
		            		//$md5 = "1";
		            		return view('mdl-dashboard.login-admin',['message1' => $errorMessage]);
		            	}
		     		}
		     	}       	
	            else
	            {
	            	return view('mdl-dashboard.login-admin',['message1' => $errorMessage]);
	            }
        	}

		//=========This is for all Stuff==================//
		if($type==3)
		{
			$result3 = DB::table('adminStuffs')
                    ->where('stuff_username',$name)
                    ->count();
            if($result3>0)
            {
            	$stuff_dept = DB::table('adminStuffs')
            				->where('stuff_username',$name)
                    		->get();
               foreach($stuff_dept as $row)
               {
               	if($md5 == $row->stuff_password)
               		{
               		$stuff_infos = DB::table('departments')
               					->where('dept_id',$row->dept_id)
               					->get();
               	foreach ($stuff_infos as $rws) {
               				//$dept_name = $rws['dept_name'];
               				
               	Session::put('deptname', $rws->dept_name);
               	Session::put('dept_id', $rws->dept_id );
               	Session::put('username',$name);
               	return view('mdl-dashboard.stuff_index_dashboard');
               }
           	  }
           	  else
           	  {
           	  	return view('mdl-dashboard.login-admin',['message1' => $errorMessage]);	
           	  }
            }
        }
            else
            {
            	return view('mdl-dashboard.login-admin',['message1' => $errorMessage]);
            }
		}

		//=========This is for all Teacher==================//
		if($type==4)
		{
			$result4 = DB::table('adminTeachers')
                    ->where('th_username',$name)
                    ->count();
            if($result4>0)
            {
            	$th_dept = DB::table('adminTeachers')
            				->where('th_username',$name)
                    		->get();
               foreach($th_dept as $row4)
               {
               	if($md5 == $row4->th_password)
               		{
               		$th_infos = DB::table('departments')
               					->where('dept_id',$row4->dept_id)
               					->get();
               	foreach ($th_infos as $rws4) {
               				//$dept_name = $rws['dept_name'];
               				
               	Session::put('th_deptname', $rws4->dept_name);
                Session::put('th_dept_id', $rws4->dept_id );
               	Session::put('th_name', $row4->th_name );
               	Session::put('th_username',$name);
               	return view('mdl-dashboard.th_index_dashboard');
               }
           	  }
           	  else
           	  {
           	  	return view('mdl-dashboard.login-admin',['message1' => $errorMessage]);	
           	  }
            }
        }
            else
            {
            	return view('mdl-dashboard.login-admin',['message1' => $errorMessage]);
            }
		}

	}

	public function testGet()
	{
		if(Session::has('vc_username')){
			return view('mdl-dashboard.vc_index_dashboard');
		}
		
		if(Session::has('username')){  //username = stuff_username
			return view('mdl-dashboard.stuff_index_dashboard');
		}
		
		if(Session::has('CRH_username')){
			return view('mdl-dashboard.crh_index_dashboard');
		}
		
		if(Session::has('th_username')){
			return view('mdl-dashboard.th_index_dashboard');
		}
	}
}
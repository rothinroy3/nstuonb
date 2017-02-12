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

class ChangePassStuffController extends Controller
{

    public function stuffChngPass()
    {
       
    	return view('mdl-dashboard.stuff_index_dashboardChange_password');
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

        	if(Session::has('username'))
        	{
        		$nameInSesion = Session::get('username');

        		$names = DB::table('adminStuffs')
            					->where('stuff_username',$nameInSesion)
            					->get();
            		foreach($names as $row)
            		{
            			$id = $row->id;
            			$crhName = $row->stuff_username;
            			$crhPass = $row->stuff_password;

            			if(md5($oldpass) != $crhPass)
            			{
            				return Redirect::to('/admin/loggedinStuff/StuffChangePass')->with('OldNotmatchStuff','Old Password is Invalid');
            			}
            			if(md5($newpass) != md5($confpass))
            			{
            				return Redirect::to('/admin/loggedinStuff/StuffChangePass')->with('NewNotmatchStuff','Confirm Password Does not Match');
            			}
            			$newp = md5($newpass);
            			$result = DB::table('adminStuffs')
            					->where('id',$id)
            					->update(['stuff_username'=> $name,'stuff_password'=> $newp,
            						]);
            			if($result == true)
            			{
            			  $destroy = Session::forget('username');
            			  $newSession = Session::put('username',$name);
            			  if(Session::has('username')){

            					return Redirect::action('ChangePassStuffController@stuffChngPass')->with('approveMessagePassStuff','Password or Username Updated');
            				}
			            	else{
			        		return view('stuff_index_dashboardChange_password');
			    			}
            			}

            		}

            		
        	}
        	else{
        		return view('stuff_index_dashboardChange_password');
    			}
    	}
	}




/*

       		$table1 = new Department;
       		$table1->dept_name = $data->Input('name');
       		$success1 = $table1->save();

            if($success1==true){
            	$new_dept_id = DB::table('departments')
            					->where('dept_name',$data->Input('name'))
            					->get();
            	foreach ($new_dept_id as $row) {
            		
            		$id = $row->dept_id;

            		$crh_pass = md5($_POST['ch_pass']);	
            	
            $table = DB::table('adminCRHs')->insert([
            	'username'=> $data->Input('ch_name'),'password'=>$crh_pass,'dept_id'=>$id
            	]);
            //$table->username = $data->Input('ch_name');
            //$table->password = $data->Input('ch_pass');
            //$table->dept_id = $id;
            //$success2 = $table->save();
            if($table==true)
            {
            	$stuff_pass = md5(Input::get('stuff_pass'));

            	$tabl2 = DB::table('adminStuffs')->insert([
            		'stuff_username'=>$data->Input('stuff_name'),'stuff_password' => $stuff_pass,'dept_id' => $id
            		]);
            	//$table2 = new AdminStuff;
            	//$table2->stuff_username = $data->Input('stuff_name');
            	//$table2->stuff_password = $data->Input('stuff_pass');
            	//$table2->dept_id = $id;
            	//$table2->save();
            
            	return Redirect::to('/admin/loggedin/addDepartment')->with('successAdd','New Department have been Added');
        		  }
        		}
        	}
    	}
    }

}

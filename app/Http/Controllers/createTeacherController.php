<?php

namespace App\Http\Controllers;
use DB;
use App\Department;
use App\AdminTeacher;
use Validator;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Support\Facades\Input; //added by roy
use Illuminate\Support\Facades\Session;

class createTeacherController extends Controller
{

    public function createTeacherView()
    {
      	$deptId = Session::get('CRH_dept_id');
      	$all_th = DB::table('adminTeachers')
      					->Where('dept_id',$deptId)
         				->orderBy('id','desc')
                        ->get();

    	return view('mdl-dashboard.crh_index_createTeacher',['all_th' => $all_th ]);
    	//return view('mdl-dashboard.crh_index_createTeacher');
    }

    public function createTeacher(Request $data)
    {
    	$validation = Validator::make($data->all(),array(
            'th_name' => 'required|max:255',
            'th_username' => 'required|max:255',
            'th_password' => 'required|min:4|max:20',
            ));
        if($validation->fails())
        {
           return Redirect::to('admin/loggedin/createTeacher')->withErrors($validation); 
        }
        else{
        	
        	$id = $data->Input('dept_id');
            $th_pass = md5($_POST['th_password']);	
            	
               $table = DB::table('adminTeachers')->insert([
            'th_name'=> $data->Input('th_name'),'th_username'=> $data->Input('th_username'),'th_password'=>$th_pass,'dept_id'=>$id
            	]);

            
            return Redirect::to('admin/loggedin/createTeacher')->with('CreateTeachersuccess','New Teacher Created Successfully!');
        		  
        }
    }
 }

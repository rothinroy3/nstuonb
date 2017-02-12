<?php

namespace App\Http\Controllers;
use DB;
use App\Department;
use App\AdminStuff;
use App\AdminCRH;
use Validator;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Support\Facades\Input; //added by roy
use Illuminate\Support\Facades\Hash; //added by roy


class AddDepartmentController extends Controller
{

    public function addDept(Request $data)
    {

    $validation = Validator::make($data->all(),array(
            'name' => 'required|max:255',
            'department_type' => 'required',
            'username' => 'required|max:255',
            'password' => 'required|min:4|max:20',
            ));
        if($validation->fails())
        {
           return Redirect::to('/admin/loggedin/addDepartment')->withErrors($validation); 
        }
        else{

       		$table1 = new Department;
       		$table1->dept_name = $data->Input('name');
            $table1->dept_type = $data->Input('department_type');
       		$success1 = $table1->save();

            if($success1==true){
            	$new_dept_id = DB::table('departments')
            					->where('dept_name',$data->Input('name'))
            					->get();
            	foreach ($new_dept_id as $row) {
            		
            		$id = $row->dept_id;

            		$crh_pass = md5($_POST['password']);	
            	
                $table = DB::table('adminCRHs')->insert([
            	'username'=> $data->Input('username'),'password'=>$crh_pass,'dept_id'=>$id
            	]);

            
            	return Redirect::to('/admin/loggedin/addDepartment')->with('successAdd','New Department have been Added Successfully!');
        		  
        		}
        	}
    	}
	}
}


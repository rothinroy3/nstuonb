<?php

namespace App\Http\Controllers;
use DB;
use App\Department;
use App\AdminStuff;
use Validator;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Support\Facades\Input; //added by roy
use Illuminate\Support\Facades\Session;

class createStuffController extends Controller
{

    public function createStuffView()
    {
      	$deptId = Session::get('CRH_dept_id');
      	$all_stuff = DB::table('adminStuffs')
      					->Where('dept_id',$deptId)
         				->orderBy('id','desc')
                        ->get();

    	return view('mdl-dashboard.crh_index_createStuff',['allStuffs' => $all_stuff ]);
    }

    public function createStuff(Request $data)
    {
    	$validation = Validator::make($data->all(),array(
            'stuff_name' => 'required|max:255',
            'stuff_username' => 'required|max:255',
            'stuff_password' => 'required|min:4|max:20',
            ));
        if($validation->fails())
        {
           return Redirect::to('/admin/loggedin/createStuff')->withErrors($validation); 
        }
        else{
        	
        	$id = $data->Input('dept_id');
            $crh_pass = md5($_POST['stuff_password']);	
            	
                $table = DB::table('adminStuffs')->insert([
            	'stuff_name'=> $data->Input('stuff_name'),'stuff_username'=> $data->Input('stuff_username'),'stuff_password'=>$crh_pass,'dept_id'=>$id
            	]);

            
            return Redirect::to('/admin/loggedin/createStuff')->with('CreateStuffsuccess','New Stuff Created Successfully!');
        		  
        }
    }
 }

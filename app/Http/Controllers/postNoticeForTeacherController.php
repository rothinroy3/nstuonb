<?php

namespace App\Http\Controllers;
use DB;
use App\Notice;
use Validator;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Support\Facades\Input; //added by roy
use Illuminate\Support\Facades\Session;

class postNoticeForTeacherController extends Controller
{

    public function view()
	    {
	    //return Redirect::to('/admin/loggedin');
	    return view('mdl-dashboard.th_index_addNotice');
	    }


    public function post(Request $data)
    {

    	$validation = Validator::make($data->all(),array(
            	'name' => 'required',
            	'file' => 'mimes:pdf|Max:2000KB'
            		));
        if($validation->fails())
        {
           return Redirect::to('/admin/loggedin/postNoticeForTeacher')->withErrors($validation); 
        }
        else{

        //if(Input::hasFile('photo'))
        //{

            //$file = Input::file('photo');
           //$success = $file->move('uploads', $file->getClientOriginalName());
            $source = Session::get('th_name');
        	if($data->file('file')==''){

        	$table = new Notice;
            $table->notice_name = $data->Input('name');
            $table->notice_details = $data->Input('description');
            $table->notice_content = '';
            $table->notice_date = date('Y-m-d');
            $table->dept_id = $data->Input('dept_id');
            $table->notice_status = '1';
            $table->notice_source = $source;
            $table->save();
            return Redirect::to('/admin/loggedin/postNoticeForTeacher')->with('success','Notice submitted.');
        	}
        	else{
        
            $image = $data->file('file');
            $folder = 'uploads/test/up/notice';
            $filename = $image->getClientOriginalName();
            $ext = pathinfo(storage_path().'uploads/test/up/notice/'.$filename, PATHINFO_EXTENSION);
            $fileName = str_random(30);
            $success = $image->move($folder,$fileName.'.'.$ext);

            if($success==true){

            $table = new Notice;
            $table->notice_name = $data->Input('name');
            $table->notice_details = $data->Input('description');
            $table->notice_content = $fileName.'.'.$ext;
            $table->notice_date = date('Y-m-d');
            $table->dept_id = $data->Input('dept_id');
            $table->notice_status = '1';
            $table->notice_source = $source;
            $table->save();
            return Redirect::to('/admin/loggedin/postNoticeForTeacher')->with('success','Notice submitted');
        }
     }
    }
  }

}

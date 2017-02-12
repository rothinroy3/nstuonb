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

class addNoticeController extends Controller
{

    public function addNotice(Request $data)
    {

    $validation = Validator::make($data->all(),array(
            'name' => 'required',
            'file' => 'required|mimes:pdf|Max:2000KB'
            ));
        if($validation->fails())
        {
           return Redirect::to('/admin/loggedin/postNotice')->withErrors($validation); 
        }
        else{

        //if(Input::hasFile('photo'))
        //{

            //$file = Input::file('photo');
           //$success = $file->move('uploads', $file->getClientOriginalName());
        
            $image = $data->file('file');
            $folder = 'uploads/test/up/notice';
            $filename = $image->getClientOriginalName();
            $success = $image->move($folder,$filename);

            if($success==true){

            $table = new Notice;
            $table->notice_name = $data->Input('name');
            $table->notice_details = $data->Input('description');
            $table->notice_content = $filename;
            $table->notice_date = date('Y-m-d');
            $table->dept_id = $data->Input('dept_id');
            $table->notice_status = '0';
            $table->save();
            return Redirect::to('/admin/loggedin/postNotice')->with('success','Notice have been Submitted');
        }
    }
  }
}


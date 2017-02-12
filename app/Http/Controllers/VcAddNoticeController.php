<?php

namespace App\Http\Controllers;
use DB;
use App\Vcnotice;
use Validator;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Support\Facades\Input; //added by roy

class VcAddNoticeController extends Controller
{

    public function vcAddNotice(Request $data)
    {

    $validation = Validator::make($data->all(),array(
            'name' => 'required|max:255',
            'tinyMCE' => 'max:5000',
            'file' => 'mimes:pdf|Max:2000KB'
            ));
        if($validation->fails())
        {
           return Redirect::to('/admin/loggedin/VcAddNotice')->withErrors($validation);
        }
        else{

            if($data->file('file')==''){

            $table = new Vcnotice;
            $table->vc_notice_name = $data->Input('name');
            $table->vc_notice_details = $data->Input('tinyMCE');
            $table->vc_notice_content = '';
            $table->date = date('Y-m-d');
            $table->save();
            return Redirect::to('/admin/loggedin/VcAddNotice')->with('successVcAddNotice','Notice posted.');
            }
            else{

            $file = $data->file('file');
            $folder = 'uploads/test/vc/notice';
            $filename = $file->getClientOriginalName();
            $ext = pathinfo(storage_path().'uploads/test/vc/notice'.$filename, PATHINFO_EXTENSION);
            $fileName = str_random(30);
            $success = $file->move($folder,$fileName.'.'.$ext);

            if($success==true){

            $table = new Vcnotice;
            $table->vc_notice_name = $data->Input('name');
            $table->vc_notice_details = $data->Input('tinyMCE');
            $table->vc_notice_content = $fileName.'.'.$ext;
            $table->date = date('Y-m-d');
            $table->save();
            return Redirect::to('/admin/loggedin/VcAddNotice')->with('successVcAddNotice','Notice have been Added');
        }
    }
    }
}
}


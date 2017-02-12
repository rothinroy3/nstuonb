<?php

namespace App\Http\Controllers;
use DB;
use App\Vcnotice;
//use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input; //added by roy

class viewAllVcNoticeController extends Controller
{

    public function vcNoticeView($id)
    {
       

        $approve = DB::table('vcnotices')
                    ->where('vc_notice_id',$id)
                    ->update(array('vc_notice_name' => Input::get('name'),'vc_notice_details' => Input::get('tinyMCE')));
        if($approve==true)
        {
            //$message = "Notice have been Approved";
            //return Redirect::to('/admin/loggedin/approveNotice',['approveMessage' => $message]);
            //return view('mdl-dashboard.crh_index_dashboard',['approveMessage' => $message]);
            return Redirect::action('VcViewNoticeController@myView')->with('approveMessage',' Notice Updated');
        }

    
    }

}

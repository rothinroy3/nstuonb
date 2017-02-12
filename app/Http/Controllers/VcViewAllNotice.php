<?php

namespace App\Http\Controllers;
use DB;
use App\Notice;
//use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input; //added by roy

class VcViewAllNoticeController extends Controller
{

    public function approve($id)
    {
        //$data = Notice::find($id);
        $app = '1';

        $approve = DB::table('notices')
                    ->where('notice_id',$id)
                    ->update(array('notice_status' => $app));
        if($approve==true)
        {
            //$message = "Notice have been Approved";
            //return Redirect::to('/admin/loggedin/approveNotice',['approveMessage' => $message]);
            //return view('mdl-dashboard.crh_index_dashboard',['approveMessage' => $message]);
            return Redirect::action('PostNoticeController@allNotice')->with('approveMessage',' Notice have been Approved');
        }

    
    }

}

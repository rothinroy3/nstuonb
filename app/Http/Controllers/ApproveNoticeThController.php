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

class ApproveNoticeThController extends Controller
{

    public function approve($id)
    {
        $app = '1';

        $approve = DB::table('notices')
                    ->where('notice_id',$id)
                    ->update(array('notice_status' => $app));
        if($approve==true)
        {
            return Redirect::action('viewNoticeForTeacherController@thView')->with('approveMessage',' Notice approved successfully.');
        }
    }
}

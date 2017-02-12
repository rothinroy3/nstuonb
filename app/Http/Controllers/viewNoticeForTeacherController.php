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

class viewNoticeForTeacherController extends Controller
{


    public function thView()
    {
        if(Session::has('th_dept_id'))
        {
            $id = Session::get('th_dept_id');

            $all_notices = DB::table('notices')
                        ->where('dept_id',$id)
                        ->orderBy('notice_id','desc')
                        ->paginate(10);
            //$user = DB::table('notices')
              //      ->where('dept_id',$id)
        return view('mdl-dashboard.th_index_viewNotice',['noticesTeacher' => $all_notices]);              
        }
        else
        {
           return view('mdl-dashboard.th_index_viewNotice');  
        }
    
    }

}

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

class PostNoticeController extends Controller
{

    public function post()
    {
    //return Redirect::to('/admin/loggedin');
    return view('mdl-dashboard.stuff_index_addNotice');
    }

    public function allNotice()
    {
        if(Session::has('CRH_dept_id'))
        {
            $id = Session::get('CRH_dept_id');

            $all_notices = DB::table('notices')
                        ->where('dept_id',$id)
                        ->orderBy('notice_id','desc')
                        ->paginate(10);
            return view('mdl-dashboard.crh_index_dashboard',['notices' => $all_notices ]);
        }
        else
        {
            return view('mdl-dashboard.crh_index_dashboard');
        }
    }

}

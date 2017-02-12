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

class ViewNoticeForStuffController extends Controller
{


    public function stuffview()
    {
        if(Session::has('dept_id'))
        {
            $id = Session::get('dept_id');

            $all_notices = DB::table('notices')
                        ->where('dept_id',$id)
                        ->orderBy('notice_id','desc')
                        ->paginate(10);
            //$user = DB::table('notices')
              //      ->where('dept_id',$id)
        return view('mdl-dashboard.stuff_index_dashboard2',['noticesStuff' => $all_notices]);              
        }
        else
        {
           return view('mdl-dashboard.stuff_index_dashboard2');  
        }
    
    }

}

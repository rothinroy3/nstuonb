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

class VcViewNoticeController extends Controller
{


    public function myView()
    {
         $all_notices = DB::table('vcnotices')
         				->orderBy('vc_notice_id','desc')
                        ->paginate(10);

    return view('mdl-dashboard.vc_index_dashboardVcnotice',['allDeptsVc' => $all_notices ]);
    }

}

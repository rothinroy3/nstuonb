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

class VcViewAllDepartmentController extends Controller
{


    public function view()
    {
         $all_depts = DB::table('departments')
         				->orderBy('dept_id','desc')
                        ->get();
    return view('mdl-dashboard.vc_index_dashboardAddDept',['allDepts' => $all_depts ]);
    }

}

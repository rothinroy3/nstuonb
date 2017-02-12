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

    public function DeptwiseView($id)
    {
        $results = DB::table('notices')
                ->where('dept_id',$id)
                ->orderBy('notice_id','desc')
                ->paginate(10);
        $dept_name = DB::table('departments')
                    ->where('dept_id',$id)
                    ->get();
            return view('mdl-dashboard.vc_index_dashboard_deptwiseNotice_view',['allDeptNotices'=>$results],['deptName' => $dept_name]); 
    }

    public function DeptUpdate($id)
    {
        $updates = DB::table('departments')
                ->where('dept_id',$id)
                ->update(array('dept_name' => Input::get('name'),'dept_type' => Input::get('department_type')));
        if($updates==true)
        {
            //$message = "Notice have been Approved";
            //return Redirect::to('/admin/loggedin/approveNotice',['approveMessage' => $message]);
            //return view('mdl-dashboard.crh_index_dashboard',['approveMessage' => $message]);
            return Redirect::action('VcViewAllDepartmentController@view')->with('approveMessage',' Department Name or Type is Updated');
        }
    }

}

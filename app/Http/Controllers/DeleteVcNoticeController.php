<?php

namespace App\Http\Controllers;
use DB;
use App\Vcnotice;
//use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File; //added by roy


class DeleteVcNoticeController extends Controller
{

    public function deleteVcNotice($id)
    {
       
        $filename = DB::table('vcnotices')
                    ->where('vc_notice_id',$id)
                    ->get();
        foreach ($filename as $files) {
            $notice = $files->vc_notice_content;
            

            $delete = DB::table('vcnotices')
                    ->where('vc_notice_id',$id)
                    ->delete();
                if($delete==true)
                {
                    File::delete('uploads/test/vc/notice/'.$notice);

                    //$message = "Notice have been Deleted successfully!";
                    return Redirect::action('VcViewNoticeController@myView')->with('approveMessageDelete',' Succesfully Deleted');
                }
        }

    
    }

}

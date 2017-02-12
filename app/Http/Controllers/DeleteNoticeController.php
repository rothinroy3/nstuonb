<?php

namespace App\Http\Controllers;
use DB;
use App\Notice;
//use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File; //added by roy


class DeleteNoticeController extends Controller
{

    public function delete($id)
    {
        //$data = Notice::find($id);
        //$app = '1';
        $filename = DB::table('notices')
                    ->where('notice_id',$id)
                    ->get();
        foreach ($filename as $files) {
            $notice = $files->notice_content;
            

            $delete = DB::table('notices')
                    ->where('notice_id',$id)
                    ->delete();
                if($delete==true)
                {
                    File::delete('uploads/test/up/notice/'.$notice);

                    //$message = "Notice have been Deleted successfully!";
                    return Redirect::action('PostNoticeController@allNotice')->with('approveMessageDelete',' Succesfully Deleted');
                    //return view('mdl-dashboard.crh_index_dashboard',['approveMessage' => $message]);

                    //eturn Redirect::action('PageController@home')->with('success', 'Page successfully deleted!');
                }
        }

    
    }

}

<?php

namespace App\Http\Controllers;
use DB;
use App\AdminTeacher;
//use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File; //added by roy


class DeleteTeacherController extends Controller
{

    public function delete($id)
    {
        $delete = DB::table('adminTeachers')
                  ->where('id',$id)
                   ->delete();
            if($delete==true)
                {
                    return Redirect::action('createTeacherController@createTeacherView')->with('MessageDeleteTeacher',' Succesfully Deleted');   
                }
        }

    
    }

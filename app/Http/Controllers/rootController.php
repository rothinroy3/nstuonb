<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use App\Department;
use App\Notice;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Input; //added by roy


class rootController extends Controller
{
    protected $posts_per_page = 3;

    public function firstView(Request $request)
    {
        
         $posts = DB::table('notices')
                ->join('departments', function($join){
                    $join->on('departments.dept_id','=','notices.dept_id')
                    ->where('departments.dept_type','=',0)
                    ->where('notices.notice_status','=',1);
                    })
                ->orderBy('notice_id','desc')
                ->paginate($this->posts_per_page);
            
            //$posts = Notice::paginate($this->posts_per_page);
            
            $vc = DB::table('vcnotices')
                ->orderBy('vc_notice_id','desc')
                ->limit(50)
                ->get();

            return view('mdl.index',['posts' => $posts],['vcnotice' => $vc]);
            //return view('mdl.index')->with(compact('posts'));
        }
    }

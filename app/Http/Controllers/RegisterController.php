<?php

namespace App\Http\Controllers;
use DB;
use App\User;
use App\Http\Requests;
use Illuminate\Http\Request;
//use App\Http\Controllers\Validator;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input; //added by roy
//use Illuminate\Database\Eloquent\Controller;

class RegisterController extends Controller
{
    public function index()
    {
         $all_dept = DB::table('departments')
         			->where('dept_type','1')
         			->get();

        return view('auth.register',['dept_info' => $all_dept]);
    }

}
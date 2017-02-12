<?php

namespace App\Http\Controllers;
use DB;
use App\Ups;
use App\Http\Requests;
use Illuminate\Http\Request;
//use App\Http\Controllers\Validator;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input; //added by roy

class PaginationController extends Controller
{
    public function index()
    {
        $user = DB::table('ups')->paginate(2);

        //To find the class name
        //dd(get_class($user));
        return view('up_pagination',['users' =>$user]);
    }
}

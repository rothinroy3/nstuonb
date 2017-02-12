<?php

namespace App\Http\Controllers;

use DB;
use App\Http\Requests;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $alls = DB::table('departments')->get();

        //return view('mdl-dashboard.index_dashboard',['depts' => $alls]);
        return view('mdl-dashboard.login-admin');

    }
}

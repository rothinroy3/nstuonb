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

class CRHaddNoticeController extends Controller
{

    public function addNotice()
    {
    //return Redirect::to('/admin/loggedin');
    return view('mdl-dashboard.crh_index_addNotice');
    }
}

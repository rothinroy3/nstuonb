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

class UpController extends Controller
{
    public function upload()
    {
        return view('up');
    }

    public function store(Request $data){
        $validation = Validator::make($data->all(),array(
            'firstname' => 'required',
            'photo' => 'required|mimes:jpg,jpeg|max:900',
            ));
        if($validation->fails())
        {
           return Redirect::to('/up')->withErrors($validation); 
        }
        else{

        //if(Input::hasFile('photo'))
        //{

            //$file = Input::file('photo');
           //$success = $file->move('uploads', $file->getClientOriginalName());
        
            $image = $data->file('photo');
            $folder = 'uploads';
            $filename = $image->getClientOriginalName();
            $success = $image->move($folder,$filename);

            if($success){

            $table = new Ups;
            $table->firstname = $data->Input('firstname');
            $table->photo = $filename;
           
            //print_r($table);exit();
            $table->save();
            return Redirect::to('/up')->with('success','Data Submitted');
        }
        else
        {
            echo "djshdjhjdhjd";
        }
    }
    
    }
}

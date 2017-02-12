<?php

namespace App\Http\Controllers;
use DB;
use App\Upload2s;
use App\Http\Requests;
use Illuminate\Http\Request;
//use App\Http\Controllers\Validator;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input; //added by roy

class Upload2Controller extends Controller
{
    public function upload2()
    {
        return view('upload2');
    }

    public function store(Request $data){
        $validation = Validator::make($data->all(),array(
            'firstname' => 'required',
            'email' => 'required',
            'photo' => 'required|mimes:jpg,jpeg|max:900',
            'password'=>'required|min:5',
            'password_confirmation'=>'required',
            ));
        if($validation->fails())
        {
           return Redirect::to('/upload2')->withErrors($validation); 
        }
        else{

        //if(Input::hasFile('photo'))
        //{

            //$file = Input::file('photo');
           //$success = $file->move('uploads', $file->getClientOriginalName());
        
            $image = $data->file('photo');
            $folder = 'uploads/test';
            $filename = $image->getClientOriginalName();
            $success = $image->move($folder,$filename);

            if($success==true){

            $table = new Upload2s;
            $table->firstname = $data->Input('firstname');
            $table->dept_id = $data->Input('department');
            $table->photo = $filename;
            $table->email = $data->Input('email');
            $table->password = $data->Input('password');
            $table->save();
            return Redirect::to('/upload2')->with('success','Data Submitted');
        }
    }
    
    }
}

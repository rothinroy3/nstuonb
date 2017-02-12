<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input; //added by roy

class UploadController extends Controller
{
    public function upload(){
        //return 'dfhdjfhjdh';
        if(Input::hasFile('file'))
        {

            $file = Input::file('file');
            $file->move('uploads', $file->getClientOriginalName());
            return '<img src="uploads/'.$file->getClientOriginalName().'" style="width:350;height:280;margin-left:300px">';
            
        }
    }
}

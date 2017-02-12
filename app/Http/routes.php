<?php


/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
/*
Route::group(['middleware' => ['web']], function () {

    Route::get('/', function () {
        return view('welcome');
    });

});
*/
Route::get('encr',function(){
	$e = Crypt::encrypt('rothin');
	$d = Crypt::decrypt($e);
	return "this is encription".$e."<br>".$d;
});
Route::get('hash',function(){
	$p =Hash::make('roy');
	if(Hash::check('roy',$p))
	{
		return "You are LoggedIn with = f" .$p;
	}
	else
	{
		return abort(503);
	}
	
});



/*==================Start================================*/


Route::group(['middleware' => 'web'], function () {
    Route::auth();


    Route::get('/','rootController@firstView');
    Route::get('/register', 'RegisterController@index');


    //Admin panel Route Goes Here........
    Route::get('/admin','AdminController@index');
    Route::post('/admin/loggedin','LoginAdminController@test'); //common stuff,chairman,vc
    Route::get('/admin/loggedin','LoginAdminController@testGet');
/*
//==========pagination-===================
    Route::get('/ajax/vc',function(){

        $products = DB::table('notices')
                ->orderBy('notice_id','desc')
                ->paginate(2);
        return View::make('mdl.indexvc',['products' => $products])->render();

});

/***------------------------------------------------*
|||||||||  Admin Panel Route Goes From Here  ||||||||  
/***------------------------------------------------*/


   //============Stuff Section Start======================//
    
    Route::get('/admin/loggedin/postNotice','PostNoticeController@post');

    //add notice
    Route::post('/admin/loggedin/postNotice/addNotice','addNoticeController@addNotice');

    //View Notice For Stuff
    Route::get('/admin/loggedin/viewNoticeForStuff', 'ViewNoticeForStuffController@stuffview');

    // Stuff Logout
    Route::get('/admin/loggedin/logout','stuffLogoutController@logout');

    //Stuff Change Password
    Route::get('/admin/loggedinStuff/StuffChangePass','ChangePassStuffController@stuffChngPass');
    Route::post('/admin/loggedinStuff/StuffChangePass','ChangePassStuffController@changePassword');

    //=======================End====================================//

    //=================Teacher Section Start========================//

    Route::get('/admin/loggedin/postNoticeForTeacher','postNoticeForTeacherController@view');
    Route::post('/admin/loggedin/postNoticeForTeacher','postNoticeForTeacherController@post');

    //view Notice
    Route::get('/admin/loggedin/viewNoticeForTeacher','viewNoticeForTeacherController@thView');

    //Notice Delete 
    Route::get('/admin/loggedin/viewNoticeForTeacher/{id}/delete',['as'=>'deleteNoticeRouteTh','uses' => 'DeleteNoticeThController@delete']);
    //Notice Approved 
    Route::get('/admin/loggedin/viewNoticeForTeacher/{id}/approve',['as'=>'getApproveRouteTh','uses' => 'ApproveNoticeThController@approve']);
    // Teacher Logout
    Route::get('/admin/loggedin/logoutTh','ThLogoutController@logout');
    //Teacher Change Password
    Route::get('/admin/loggedin/changePassForTeacher','ChangePassThController@thChngPass');
    Route::post('/admin/loggedin/changePassForTeacher','ChangePassThController@thChngPassFinal');


    //=================Teacher Section End==========================//


    //====================CRH section================================// 

    //Create Stuff
    Route::get('/admin/loggedin/createStuff','createStuffController@createStuffView');
    Route::post('/admin/loggedin/createStuff','createStuffController@createStuff');

    //Create Teacher
    Route::get('/admin/loggedin/createTeacher','createTeacherController@createTeacherView');
    Route::post('admin/loggedin/createTeacher','createTeacherController@createTeacher');


    //add notice
    Route::post('admin/loggedin/chAddNotice/chPostNotice','chAddNoticeController@chAddNotice');

    Route::get('/admin/loggedin/approveNotice','PostNoticeController@allNotice');

    // CRh Logout
    Route::get('/admin/loggedin/logoutCRH','CRHLogoutController@logout');

    //Notice Approved 
    Route::get('/admin/loggedin/{id}/approve',['as'=>'getApproveRoute','uses' => 'ApproveNoticeController@approve']);
    //Notice Delete 
    Route::get('/admin/loggedin/{id}/delete',['as'=>'deleteNoticeRoute','uses' => 'DeleteNoticeController@delete']);
    //Stuff Delete
    Route::get('/admin/loggedin/createStuff/{id}/delete',['as'=>'deleteStuffRoute','uses' => 'DeleteStuffController@delete']);
    //Teacher Delete
    Route::get('/admin/loggedin/createTeacher/{id}/delete',['as'=>'deleteTeacherRoute','uses' => 'DeleteTeacherController@delete']);

    //Add Notice
    Route::get('/admin/loggedin/chAddNotice','CRHaddNoticeController@addNotice');

    //Change password

    Route::get('/admin/loggedin/ChangePasswordCRH', 'ChangePasswordCRHController@changePasswordCRH');
    
    Route::post('/admin/loggedin/ChangePasswordCRH', 'ChangePasswordCRHController@changePassword');

    //======================End=============================================//

    //=====================VC Sir===========================================//

    //Route::get('/admin/loggedin','LoginAdminController@testGetVC');

    //Log out
    Route::get('/admin/loggedin/logoutVC','VcLogoutController@logout');

    //add department
    Route::get('/admin/loggedin/addDepartment', 'VcViewAllDepartmentController@view');
    Route::post('/admin/loggedin/addDepartment','AddDepartmentController@addDept');

    //Add Vc Notice
    Route::post('/admin/loggedin/VcAddNotice','VcAddNoticeController@vcAddNotice');
    Route::get('/admin/loggedin/VcAddNotice',function(){
    	return view('mdl-dashboard.vc_index_dashboardAddNotice');
    });

    //View Vc notices
    Route::get('/admin/loggedin/VcViewNotice','VcViewNoticeController@myView');
    Route::post('/admin/loggedin/{id}/DeleteVcNotice',[ 'as' =>'vcNotices','uses' => 'viewAllVcNoticeController@vcNoticeView']);

    //vc delete notices
    Route::get('/admin/loggedin/{id}/DeleteVcNotice',['as' => 'VcdeleteNotices','uses'=>'DeleteVcNoticeController@deleteVcNotice']);
   
    //vc password change
    Route::get('/admin/loggedin/vcChangePassword','ChangePasswordVCController@changePasswordVC');
    Route::post('/admin/loggedin/vcChangePassword', 'ChangePasswordVCController@changePassword');

    //Vc department wise notice view
    Route::get('/admin/loggedin/{id}/viewAllNotice',[ 'as' =>'departmentWiseNotice','uses' => 'VcViewAllNoticeController@DeptwiseView']);
    // Department name change 
    Route::post('/admin/loggedin/{id}/viewAllNotice',[ 'as' =>'departmentWiseNotice','uses' => 'VcViewAllNoticeController@DeptUpdate']);
    
});

/*==================END==================================*/



Route::get('uploader',function(){
	return View::make('upload');
});

//Route::post('/uploader',function(){
//	echo "string";
//});
Route::post('/uploader', 'UploadController@upload');
/*
Route::group(['middleware' => 'web'], function () {
    //Route::auth();

    Route::get('/upload2', 'Upload2Controller@upload2');
    Route::post('/uplo', 'Upload2Controller@store');

    Route::get('/up', 'UpController@upload');
    Route::post('/up', 'UpController@store');

*/
//pagination example
    Route::get('/pagination','PaginationController@index');
    


//});

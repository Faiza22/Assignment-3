<?php
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Code;
/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
	return view('welcome');

});



/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    //
});

Route::group(['middleware' => 'web'], function () {
    Cookie::forget('laravel_session');
    Route::auth();

    //Route::get('/home', 'HomeController@index');
    Route::get('/login', function() { Auth::logout(); return view('auth/login'); });
	Route::get('/user', 'HomeController@index');
	Route::get('/moderator', 'HomeController@mod');
	Route::post('/user', function(Request $request){
        $php=new Code();
        $php->email=Auth::user()->email;
        $php->code=$request->phpcode;

        $php->save();

        return view('home',['code'=>$request->phpcode]);
    });
	
});

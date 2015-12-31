<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Code;
use App\Http\Controllers\Auth\AuthController;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return Response
     */
    public function index()
    {
        $code='';
        return view('home',['code'=>$code]);
    }

    public function mod()
    {
        $phpCode = new Code;
        $results=$phpCode->get();
        if(count($results)>0);
            return view('moderator',['result'=>$results]);

    }

}

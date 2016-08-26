<?php
namespace App\Http\Controllers\Home;



class ErrorCodeController extends Controller
{
    public function index(){
        $rs=\DB::table('api_error_code')->get();
        return \View::make('home.error_code',['data'=>$rs]);
    }
}

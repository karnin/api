<?php
namespace App\Http\Controllers\Home;
class ApiController extends Controller
{
    public function index($version_id)
    {
        $rs=\DB::table('api_api')->where('version_id','=',$version_id)->orderBy('api_sort','desc')->orderBy('api_id','desc')->get();
        return \View::make('home.api',['api_list'=>$rs]);
    }
}

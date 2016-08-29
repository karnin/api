<?php
namespace App\Http\Controllers\Home;
class ApiGetController extends Controller
{
    public function index($api_id)
    {
        $rs=\DB::table('api_api')->leftJoin('api_version','api_version.version_id','=','api_api.version_id')->where('api_api.api_id','=',$api_id)->first();
        if($rs){
            $rs['api_header']=$rs['api_header']?json_decode($rs['api_header']):'';
            $rs['api_request_param']=$rs['api_request_param']?json_decode($rs['api_request_param']):'';
            $rs['api_response_param']=$rs['api_response_param']?json_decode($rs['api_response_param']):'';
        }
        return $this->success(['data'=>$rs]);

    }
}

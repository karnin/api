<?php
namespace App\Http\Controllers\Home;

use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    public function response($data,$message,$code,$result=[]){

        if(!$data){
            $message = $message ? $message : '暂无数据';//"暂无数据";
            $data  = array();
        }

        return  \Response::json([
            'code'=>$code,
            'message'=>$message,
            'success'=>$data,
            'result'=>$result
        ]);


    }
    public function success($data=[],$message='',$code=1){
        return $this->response($data,$message,$code);
    }
    public function error( $data=[],$message='',$code=0,$result=[]){

        return $this->response($data,$message,$code,$result);
    }
}

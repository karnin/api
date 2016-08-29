<?php
namespace App\Http\Controllers\Admin;



use Illuminate\Http\Request;

class ErrorCodeController extends AuthController
{
    public function index(){
        $rs=\DB::table('api_error_code')->get();
        return \View::make('admin.error_code',['data'=>$rs]);
    }
    public function store(Request $request){
        $rs=\DB::table('api_error_code')->insert(['error_code'=>$request->get('error_code'),'error_comment'=>$request->get('error_comment'),'ctime'=>time()]);
        if($rs){
            return $this->success([],'操作成功');
        }else{
            return $this->error([],'操作失败');
        }
    }
    public function edit($error_code_id){
        $rs=\DB::table('api_error_code')->where('error_id','=',$error_code_id)->first();

        return $this->success($rs);

    }
    public function update($error_code_id,Request $request){
        $rs=\DB::table('api_error_code')->where('error_id','=',$error_code_id)->update(['error_code'=>$request->get('error_code'),'error_comment'=>$request->get('error_comment'),'utime'=>time()]);
        if($rs){
            return $this->success([],'操作成功');
        }else{
            return $this->error([],'操作失败');
        }

    }
    public function delete($error_code_id){
        $rs=\DB::table('api_error_code')->where('error_id','=',$error_code_id)->delete();
        if($rs){
            return $this->success([],'操作成功');
        }else{
            return $this->error([],'操作失败');
        }
    }
}

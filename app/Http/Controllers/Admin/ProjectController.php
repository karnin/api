<?php
namespace App\Http\Controllers\Admin;



use Illuminate\Http\Request;

class ProjectController extends AuthController
{
    public function index(){
        $rs=\DB::table('api_project')->get();
        return \View::make('admin.project',['data'=>$rs]);
    }
    public function store(Request $request){
        $rs=\DB::table('api_project')->insert(['project_name'=>$request->get('project_name'),'ctime'=>time()]);
        if($rs){
            return $this->success([],'操作成功');
        }else{
            return $this->error([],'操作成功');
        }
    }
    public function edit($project_id){
        $rs=\DB::table('api_project')->where('project_id','=',$project_id)->first();

        return $this->success($rs);

    }
    public function update($project_id,Request $request){
        $rs=\DB::table('api_project')->where('project_id','=',$project_id)->update(['project_name'=>$request->get('project_name'),'utime'=>time()]);
        if($rs){
            return $this->success([],'操作成功');
        }else{
            return $this->error([],'操作成功');
        }

    }
    public function delete($project_id){
        $rs=\DB::table('api_project')->where('project_id','=',$project_id)->delete();
        if($rs){
            return $this->success([],'操作成功');
        }else{
            return $this->error([],'操作成功');
        }
    }
}

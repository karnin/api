<?php
namespace App\Http\Controllers\Admin;



use Illuminate\Http\Request;

class VersionController extends AuthController
{
    public function index($project_id){
        $rs=\DB::table('api_version')->where('project_id','=',$project_id)->get();
        $rs2=\DB::table('api_project')->where('project_id','=',$project_id)->first();

        return \View::make('admin.version',['data'=>$rs,'project_id'=>$project_id,'title'=>$rs2['project_name']]);
    }
    public function store(Request $request){
        $rs=\DB::table('api_version')->insert(['version_name'=>$request->get('version_name'),'project_id'=>$request->get('project_id'),'ctime'=>time()]);
        if($rs){
            return $this->success([],'操作成功');
        }else{
            return $this->error([],'操作成功');
        }
    }

    public function copy(Request $request){

        $rs=true;
        $version_id=$request->get('version_id');
        $version_name=$request->get('version_name');

        $data=\DB::table('api_version')->where('version_id','=',$version_id)->first();

        if($data){
            $data['version_name']=$version_name;
            $data['ctime']=time();
            $data['utime']=time();
            unset($data['version_id']);
            $rs = \DB::table('api_version')->insertGetId($data);

            if($rs){
                $apis=\DB::table('api_api')->where('version_id','=',$version_id)->get();
                if($apis){
                    foreach ($apis as $key=>$value){
                        $data=[];
                        $data=$value;
                        $data['version_id']=$rs;
                        $data['ctime']=time();
                        $data['utime']=time();
                        unset($data['api_id']);
                        $rs2 = \DB::table('api_api')->insert($data);
                    }
                }
            }

            if ($rs) {
                return $this->success([], '操作成功');
            } else {
                return $this->error([], '操作失败');
            }
        }else{
            return $this->error([],'操作失败');
        }


    }


    public function edit($version_id){
        $rs=\DB::table('api_version')->where('version_id','=',$version_id)->first();

        return $this->success($rs);

    }
    public function update($version_id,Request $request){
        $rs=\DB::table('api_version')->where('version_id','=',$version_id)->update(['version_name'=>$request->get('version_name'),'utime'=>time()]);
        if($rs){
            return $this->success([],'操作成功');
        }else{
            return $this->error([],'操作成功');
        }

    }
    public function delete($version_id){
        $rs=\DB::table('api_version')->where('version_id','=',$version_id)->delete();
        if($rs){
            return $this->success([],'操作成功');
        }else{
            return $this->error([],'操作成功');
        }
    }
}

<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

class ApiController extends AuthController
{
    public function index($version_id)
    {

        $rss=\DB::table('api_version')->where('version_id','=',$version_id)->first();
        $rs2=\DB::table('api_project')->where('project_id','=',$rss['project_id'])->first();
        $rs = \DB::table('api_api')->where('version_id', '=', $version_id)->get();


        foreach ($rs as $key=>$value){
            $rs[$key]['api_header']=$rs[$key]['api_header']?json_decode($rs[$key]['api_header']):'';
            $rs[$key]['api_request_param']=$rs[$key]['api_request_param']?json_decode($rs[$key]['api_request_param'],true):'';
            $rs[$key]['api_response_param']=$rs[$key]['api_response_param']?json_decode($rs[$key]['api_response_param']):'';
            if(strpos($rs[$key]['api_method'],',')){

                $rs[$key]['api_method']=explode(',',$rs[$key]['api_method']);
            }

        }

        return \View::make('admin.api', ['data' => $rs, 'version_id' => $version_id,'project_name'=>$rs2['project_name'],'project_api_url'=>$rs2['project_api_url'],'version_name'=>$rss['version_name']]);
    }

    public function store(Request $request)
    {
        $version_id = $request->get('version_id');
        $api_url = $request->get('api_url');
        $api_name = $request->get('api_name');
        $api_sort = $request->get('api_sort');
        $api_content = $request->get('api_content');
        $api_status = $request->get('api_status');
        $api_method = $request->get('api_method');
        $api_header =$request->get('api_header')?json_encode($request->get('api_header')):'';
        $api_request_param = $request->get('api_request_param')?json_encode($request->get('api_request_param')):'';
        $api_response_param =$request->get('api_response_param')? json_encode($request->get('api_response_param')):'';
        $api_response_content = $request->get('api_response_content');
        $api_request_content = $request->get('api_request_content');
        $api_error_code = $request->get('api_error_code');
        $rss=\DB::table('api_version')->where('version_id','=',$version_id)->first();

        if(is_array($api_method)){
            $api_method=implode(',',$api_method);
        }
        $rs = \DB::table('api_api')->insert([
            'project_id'=>$rss['project_id'],
            'version_id' => $version_id,
            'api_url' =>$api_url ,
            'api_name' =>$api_name ,
            'api_sort' =>$api_sort ,
            'api_content' =>$api_content ,
            'api_status' =>$api_status ,
            'api_method' =>$api_method ,
            'api_header' =>$api_header ,
            'api_request_param' =>$api_request_param ,
            'api_response_param' =>$api_response_param ,
            'api_response_content' =>$api_response_content ,
            'api_request_content' =>$api_request_content ,
            'api_error_code' =>$api_error_code ,
            'ctime' => time()
        ]);

        if ($rs) {
            return $this->success([], '操作成功');
        } else {
            return $this->error([], '操作成功');
        }
    }

    public function edit($api_id)
    {
        $rs = \DB::table('api_api')->where('api_id', '=', $api_id)->first();

        return $this->success($rs);

    }

    public function update($api_id, Request $request)
    {

        $api_url = $request->get('api_url');
        $api_name = $request->get('api_name');
        $api_sort = $request->get('api_sort');
        $api_content = $request->get('api_content');
        $api_status = $request->get('api_status');
        $api_method = $request->get('api_method');
        $api_header =$request->get('api_header')?json_encode($request->get('api_header')):'';
        $api_request_param = $request->get('api_request_param')?json_encode($request->get('api_request_param')):'';
        $api_response_param =$request->get('api_response_param')? json_encode($request->get('api_response_param')):'';
        $api_response_content = $request->get('api_response_content');
        $api_request_content = $request->get('api_request_content');
        $api_error_code = $request->get('api_error_code');


        $data=[

            'api_sort'=>$api_sort,
            'api_url' =>$api_url ,
            'api_name' =>$api_name ,
            'api_content' =>$api_content ,
            'api_status' =>$api_status ,
            'api_method' =>$api_method ,
            'api_header' =>$api_header ,
            'api_request_param' =>$api_request_param ,
            'api_response_param' =>$api_response_param ,
            'api_response_content' =>$api_response_content ,
            'api_request_content' =>$api_request_content ,
            'api_error_code' =>$api_error_code ,
            'utime' => time()
        ];
        $rs = \DB::table('api_api')->where('api_id', '=', $api_id)->update($data);
        if ($rs) {
            return $this->success([], '操作成功');
        } else {
            return $this->error([], '操作失败');
        }

    }

    public function delete($api_id)
    {
        $rs = \DB::table('api_api')->where('api_id', '=', $api_id)->delete();
        if ($rs) {
            return $this->success([], '操作成功');
        } else {
            return $this->error([], '操作失败');
        }
    }

    public function copy(Request $request)
    {

        $api_id = $request->get('api_id');
        $api_name = $request->get('api_name');
        $api_url = $request->get('api_url');
        $data=\DB::table('api_api')->where('api_id','=',$api_id)->first();

        if($data){
            $data['api_name']=$api_name;
            $data['api_url']=$api_url;
            $data['ctime']=time();
            $data['utime']=time();
            unset($data['api_id']);
            $rs = \DB::table('api_api')->insert($data);

            if ($rs) {
                return $this->success([], '操作成功');
            } else {
                return $this->error([], '操作失败');
            }
        }else{
            return $this->error([], '操作失败');
        }


    }

}

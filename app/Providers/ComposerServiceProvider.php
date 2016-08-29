<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * 在容器内注册所有绑定。
     *
     * @return void
     */
    public function boot()
    {
        // 使用对象型态的视图组件...
      /*  \View::composer(
            'profile', 'App\Http\ViewComposers\ProfileComposer'
        );*/

        // 使用闭包型态的视图组件...
        \View::composer(['admin.section_nav','home.section_nav'], function ($view) {
            $rs=\DB::table('api_project')->get();
            if ($rs){
                foreach ($rs as $key=>$value){
                    $rs2=\DB::table('api_version')->where('project_id','=',$value['project_id'])->get();

                    $rs[$key]['version']=$rs2?$rs2:[];
                }
            }

            $rs=$rs?$rs:[];
            $view->with('nav', $rs);
        });

    }

    /**
     * 注册服务提供者。
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
@extends('home.base')
@section('css')
    <style>
        .contents{font-size: 12px;}
        .contents h2{ margin-top: 30px!important; margin-bottom: 30px!important; color: #0e0e0e;}
        .contents h3{ margin-top: 30px!important; margin-bottom: 30px!important; color: #1b1b1b;}
        .pl20{text-indent: 20px;}
        .cursor{font-size: 12px;}
    </style>
@stop
@section('content')
    <div class="row">
        <div class="col-lg-3">
            <div class="ibox ">

                <div class="ibox-content">

                    <div class="dd" id="nestable">
                        <ol class="dd-list">
                            <li class="dd-item" data-id="1">
                                <div class="dd-handle">1 - Lorem ipsum</div>
                            </li>
                            <li class="dd-item" data-id="2">
                                <div class="dd-handle">2 - Dolor sit</div>

                            </li>
                            <li class="dd-item" data-id="5">
                                <div class="dd-handle">5 - Consectetuer</div>

                            </li>
                            <li class="dd-item" data-id="8">
                                <div class="dd-handle">8 - Tation ullamcorper</div>
                            </li>
                            <li class="dd-item" data-id="9">
                                <div class="dd-handle">9 - Ea commodo</div>
                            </li>
                        </ol>
                    </div>


                </div>
            </div>
        </div>
        <div class="col-lg-9">

            <div class="ibox">

                <div class="ibox-content contents">



                    <div class="p0 f12 lh26 interface-detail">
                        <div class="bb1 fb f20 pb10 C555 mt0">
                            <div class="fl m0 ">Url：http://tcc.taobao.com/cc/json/mobile_tel_segment.htm</div>
                            <div class="fr m0">
                                版本号：1.0.0

                            </div>
                            <blockquote>
                                <p class="cursor" style="color:#000;">目录</p>
                                <p class="cursor">1  功能说明</p>
                                <p class="cursor pl20"  >1.1  接口名</p>
                                <p class="cursor pl20" >1.2  版本号</p>
                                <p class="cursor pl20" >1.3  接口说明</p>
                                <p class="cursor pl20" >1.4  接口状态</p>
                                <p class="cursor" >2  接口调用说明</p>
                                <p class="cursor pl20" >2.1 URL</p>
                                <p class="cursor pl20" >2.2 HTTP请求方式</p>
                                <p class="cursor pl20" >2.3  请求头说明</p>
                                <p class="cursor pl20" >2.4  输入参数说明</p>
                                <p class="cursor pl20" >2.5  请求示例</p>
                                <p class="cursor pl20" >2.6  返回参数说明</p>
                                <p class="cursor pl20" >2.7  正确返回示例</p>
                                <p class="cursor pl20" >2.8  错误返回示例</p>
                                <p class="cursor pl20" >2.9  错误码</p>
                            </blockquote>
                            <h2 class="fb f18" id="1">1 功能说明</h2>
                            <h3 >1.1 接口名</h3>


                            <h3 >1.2 版本号</h3>
                            <span  class="">1.0</span>

                            <h3 >1.3 接口说明</h3>
                            <span  class=""></span>

                            <h3 >1.4 接口状态</h3>
                            <!-- ngIf: model.status==1 --><span class="">可用</span><!-- end ngIf: model.status==1 -->
                            <!-- ngIf: model.status==0 -->

                            <h2 class="fb f18" id="2">2接口调用说明</h2>
                            <h3 >2.1 URL</h3>
                            http://tcc.taobao.com/cc/json/mobile_tel_segment.htm

                            <h3 id="2_2">2.2 HTTP请求方式</h3>
                            POST,GET

                            <h3 id="2_3">2.3 请求头说明</h3>
                            <!-- ngIf: headers!=null&&headers.length==0 --><span  class="">
			无
		</span><!-- end ngIf: headers!=null&&headers.length==0 -->
                            <!-- ngIf: headers!=null && headers.length>0 -->

                            <h3 id="2_4">2.4 输入参数说明</h3>
                            <!-- ngIf: model.customParams -->


                            <!-- 如果不判断formParams!=null,当formParams还没加载成功,hasRequestHeader就会被调用导致报错 -->
                            <!-- ngIf: formParams!=null && formParams.length==0 -->

                            <!-- ngIf: formParams!=null && formParams.length>0 --><table class="table table-bordered " >
                                <thead>
                                <tr class="BGEEE C000">
                                    <th class="tc">名称</th>
                                    <th class="tc">是否必须</th>
                                    <th class="tc">参数位置</th>
                                    <th class="tc">类型</th>
                                    <th class="tc">默认值</th>
                                    <th class="tc w300">备注</th>
                                </tr>
                                </thead>
                                <tbody>
                                <!-- ngRepeat: item in formParams --><tr class="">
                                    <td class="tc fb C000 ">tel</td>
                                    <td class="tc C000 ">true</td>
                                    <!-- ngIf: item.inUrl && item.inUrl=='true' -->
                                    <!-- ngIf: !item.inUrl || item.inUrl!='true' --><td class="tc C000 " >普通参数</td><!-- end ngIf: !item.inUrl || item.inUrl!='true' -->
                                    <td class="tc C000">String</td>
                                    <td class="tc C000 "></td>
                                    <td class="tc C000 ">????</td>
                                </tr><!-- end ngRepeat: item in formParams -->
                                </tbody>
                            </table><!-- end ngIf: formParams!=null && formParams.length>0 -->

                            <h3 id="2_5">2.5 请求示例</h3>
                            <div class="code">
			<pre class="">????:aa
???:
????:
	tel=xxxx
</pre>
                            </div>

                            <h3 id="2_6">2.6 返回参数说明</h3>
                            <!-- ngIf: responseParams.length==0 -->
                            <!-- ngIf: responseParams.length>0 --><table class="table table-bordered">
                                <thead>
                                <tr class="BGEEE C000">
                                    <th class="tc">名称</th>
                                    <th class="tc">类型</th>
                                    <th class="tc w300">备注</th>
                                </tr>
                                </thead>
                                <tbody>
                                <!-- ngRepeat: item in responseParams --><tr class="">
                                    <td class="tc fb C000 n">__GetZoneResult_</td>
                                    <td class="tc C000 ">Json</td>
                                    <td class="tc C000 ">???????</td>
                                </tr><!-- end ngRepeat: item in responseParams -->
                                </tbody>
                            </table><!-- end ngIf: responseParams.length>0 -->

                            <h3 id="2_7">2.7 返回示例</h3>
                            <!-- ngIf: !model.trueExam -->
                            <!-- ngIf: model.trueExam --><div class="code" >
			<pre class="">{
    "mts":"1585078",
    "province":"??",
    "catName":"????",
    "telString":"15850781443",
    "areaVid":"30511",
    "ispVid":"3236139",
    "carrier":"????"
}
</pre>
                            </div>




                            <h3 id="2_9">2.9 错误码</h3>

                            <table class="table table-bordered " >
                                <thead>
                                <tr class="BGEEE C000">
                                    <th class="tc w200">Code</th>
                                    <th class="tc">Msg</th>
                                </tr>
                                </thead>
                                <tbody>
                                <!-- ngRepeat: item in errors --><tr  class="">
                                    <td class="tc fb C000 ">000012</td>
                                    <td class="tc C000 ">?????????????????????????~</td>
                                </tr><!-- end ngRepeat: item in errors --><tr  class=">
                                    <td class="tc fb C000 ">000001</td>
                                <td class="tc C000 ">??????</td>
                                </tr><!-- end ngRepeat: item in errors -->
                                </tbody>
                            </table><!-- end ngIf: errors.length>0 -->

                        </div>
                    </div>




                </div>
            </div>
        </div>


    </div>
@stop
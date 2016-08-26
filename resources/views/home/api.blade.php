@extends('home.base')
@section('css')
    <style>
        .contents {
            font-size: 14px;
        }

        .contents h3 {

            color: #0e0e0e;
        }

        .contents h4 {

            color: #1b1b1b;
        }

        .pl20 {
            text-indent: 20px;
        }

        .cursor {
            font-size: 12px;
        }
    </style>
@stop
@section('content')
    <div class="row">
        <div class="col-lg-2">
            <div class="ibox ">
                <div class="ibox-content">
                    <div class="dd" id="nestable">
                        <ol class="dd-list">
                            <?php $i = 1;?>
                            @foreach($api_list as $key=>$value)
                                <li class="dd-item" v-on:click="showApi({{ $value['api_id'] }})">
                                    <div class="dd-handle">{{ $i }} - {{ $value['api_name'] }}
                                    @if($value['api_status']==1)
                                        <a class="btn btn-danger btn-xs" href="buttons.html#">测试</a>
                                        @endif
                                    </div>
                                </li>
                                <?php $i++;?>
                            @endforeach
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-10" v-show="api_show">
            <div class="ibox">
                <div class="ibox-content contents">
                    <div class="info_api" style="border:1px solid #ddd;margin-bottom:20px;">
                        <div style="background:#f5f5f5;padding:20px;position:relative">
                            <h4 class="textshadow"><span v-text="api_obj.api_name"></span></h4>
                            <div>
                                <kbd><span v-text="api_obj.version_name"></span></kbd> - <kbd style="color:red"><span
                                            v-text="api_obj.api_method"></span></kbd> - <kbd> <span
                                            v-text="api_obj.api_url"></span> </kbd>
                            </div>
                        </div>
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <h5>请求头</h5>
                                <div class="ibox-tools">
                                    <a class="collapse-link"> <i class="fa fa-chevron-up"></i> </a>
                                </div>
                            </div>
                            <div class="ibox-content">
                                <table class="table table-hover ">
                                    <thead>
                                    <tr>
                                        <th width="15%">名称</th>
                                        <th width="10%">是否必须</th>
                                        <th width="10%">类型</th>
                                        <th width="15%">默认值</th>
                                        <th width="25%">备注</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr v-for="item in api_obj.api_header">
                                        <td><span v-text="item.name"></span></td>
                                        <td><span v-text="item.status"></span></td>
                                        <td><span v-text="item.type"></span></td>
                                        <td><span v-text="item.default"></span></td>
                                        <td><span v-text="item.comment"></span></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <h5>请求参数</h5>
                                <div class="ibox-tools">
                                    <a class="collapse-link"> <i class="fa fa-chevron-up"></i> </a>
                                </div>
                            </div>
                            <div class="ibox-content">
                                <table class="table table-hover ">
                                    <thead>
                                    <tr>
                                        <th width='15%'>名称</th>
                                        <th width='10%'>是否必须</th>
                                        <th width='10%'>位置</th>
                                        <th width='10%'>类型</th>
                                        <th width='20%'>默认值</th>
                                        <th width='25%'>备注</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr v-for="item in api_obj.api_request_param">
                                        <td><span v-text="item.name"></span></td>
                                        <td><span v-text="item.status"></span></td>
                                        <td><span v-text="item.position"></span></td>
                                        <td><span v-text="item.type"></span></td>
                                        <td><span v-text="item.default"></span></td>
                                        <td><span v-text="item.comment"></span></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <h5>返回参数</h5>
                                <div class="ibox-tools">
                                    <a class="collapse-link"> <i class="fa fa-chevron-up"></i> </a>
                                </div>
                            </div>
                            <div class="ibox-content">
                                <table class="table table-hover ">
                                    <thead>
                                    <tr>
                                        <th>名称</th>
                                        <th>类型</th>
                                        <th>默认值</th>
                                        <th>备注</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr v-for="item in api_obj.api_response_param">
                                        <td><span v-text="item.name"></span></td>
                                        <td><span v-text="item.type"></span></td>
                                        <td><span v-text="item.default"></span></td>
                                        <td><span v-text="item.comment"></span></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <h5>请求示例</h5>
                                <div class="ibox-tools">
                                    <a class="collapse-link"> <i class="fa fa-chevron-up"></i> </a>
                                </div>
                            </div>
                            <div class="ibox-content">
                                <pre><span v-text="api_obj.api_request_content"></span></pre>
                            </div>
                        </div>
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <h5>返回示例</h5>
                                <div class="ibox-tools">
                                    <a class="collapse-link"> <i class="fa fa-chevron-up"></i> </a>
                                </div>
                            </div>
                            <div class="ibox-content">
                                <pre><span v-text="api_obj.api_response_content"></span></pre>
                            </div>
                        </div>
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <h5>错误码</h5>
                                <div class="ibox-tools">
                                    <a class="collapse-link"> <i class="fa fa-chevron-up"></i> </a>
                                </div>
                            </div>
                            <div class="ibox-content">
                                <pre><span v-text="api_obj.api_error_code"></span></pre>
                            </div>
                        </div>
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <h5>接口说明</h5>
                                <div class="ibox-tools">
                                    <a class="collapse-link"> <i class="fa fa-chevron-up"></i> </a>
                                </div>
                            </div>
                            <div class="ibox-content">
                                <pre><span v-text="api_obj.api_content"></span></pre>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
@section('js')
    <script>
        Vue.config.devtools = true
        Vue.config.delimiters = ['${', '}']
        new Vue({
            el: '#app',
            data: {
                api_show: false,
                api_get: "{{ url('apiGet') }}",
                api_obj: {
                    version_name: '',
                    api_id: 0,
                    version_id: 0,
                    api_name: '',
                    api_content: '',
                    api_status: '',
                    api_url: '',
                    api_method: '',
                    api_header: [],
                    api_request_param: [],
                    api_response_param: [],
                    api_response_content: '',
                    api_request_content: '',
                    api_error_code: '',
                }
            },
            methods: {
                showApi: function (id) {
                    var _this = this;
                    this.$http.get(this.api_get + '/' + id).then(function (data) {

                        if (data.data.code == 1) {

                            _this.api_obj = data.data.success.data;
                            _this.api_show=true;
                        } else {
                            alert('无此接口');
                        }

                    }, function () {
                        alert('网络错误');
                    });
                }
            }
        })
    </script>
@stop
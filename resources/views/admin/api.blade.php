@extends('admin.base')
@section('css')
    <link href={{ asset('base/css/select2.min.css') }} rel="stylesheet">
    <style>
        .select2-close-mask {
            z-index: 2099;
        }

        .select2-dropdown {
            z-index: 3051;
        }

        .select2-container {
            width: 100% !important;
            padding: 0;
        }
        .modal-lg{
            width: 1000px;
        }
    </style>
@stop

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5><span v-text="projectName"></span> <span v-text="versionName"></span></h5>
                    <div class="ibox-tools">
                        <button type="button" class="btn btn-w-m btn-primary" v-on:click="add_button()">添加
                        </button>
                    </div>
                </div>
                <div class="ibox-content">
                    <table class="table table-bordered table-hover ">
                        <thead>
                        <tr>
                            <th>id
                            </th>
                            <th>编号</th>
                            <th>接口名称</th>

                            <th>操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if($data)
                        @foreach($data as $key=>$value)
                            <tr>
                                <td>{{ $value['api_id'] }}</td>
                                <td>{{ $value['api_sort'] }}</td>
                                <td>
                                    {{ $value['api_name'] }}
                                </td>
                                <td>
                                    <button type="button" class="btn  btn-primary btn-xs"
                                            v-on:click="copy_button({{ json_encode($value) }})">拷贝
                                    </button>
                                    <button type="button" class="btn  btn-primary btn-xs"
                                            v-on:click="update_button({{ json_encode($value) }})">修改
                                    </button>
                                    <button type="button" class="btn  btn-primary btn-xs"
                                            v-on:click="delete_submit({{ json_encode($value) }})">删除
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="modal inmodal" id="modal_copy" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content animated fadeIn">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span
                                aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" id="add_form" method="post" action=>
                        <div class="form-group"><label class="col-lg-2 control-label">名称</label>
                            <div class="col-lg-10"><input type="text" name="version_name" v-model="copyPost.api_name"
                                                          id="api_name" placeholder="名称" class="form-control"></div>
                        </div>
                        <div class="form-group"><label class="col-lg-2 control-label">url</label>
                            <div class="col-lg-10"><input type="text" name="version_name" v-model="copyPost.api_url"
                                                          id="api_name" placeholder="url" class="form-control"></div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                    <button type="button" v-on:click="copy_submit()" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal inmodal" id="modal_add" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content animated fadeIn">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span
                                aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" id="add_form" method="post" action=>
                        <div class="form-group"><label class="col-lg-2 control-label">名称</label>
                            <div class="col-lg-10"><input type="text" name="version_name" v-model="addPost.api_name"
                                                          id="api_name" placeholder="名称" class="form-control"></div>
                        </div>
                        <div class="form-group"><label class="col-lg-2 control-label">编号</label>
                            <div class="col-lg-10"><input type="text" name="api_sort" v-model="addPost.api_sort"
                                                          id="api_sort" placeholder="编号" class="form-control"></div>
                        </div>
                        <div class="form-group"><label class="col-lg-2 control-label">url</label>
                            <div class="col-lg-10"><input type="text" name="version_name" v-model="addPost.api_url"
                                                          id="api_url" placeholder="url" class="form-control"></div>
                        </div>
                        <div class="form-group"><label class="col-lg-2 control-label">方法</label>
                            <div class="col-lg-10">
                                <select class="form-control" v-model="addPost.api_method">
                                    <option v-bind:value="item.value" value="${item.value}" v-for="item in method_list">
                                        ${item.text}
                                    </option>
                                </select></div>
                            {{--   <input type="text" name="version_name" v-model="addPost.api_method"
                                                        id="api_method" placeholder="方法" class="form-control"></div>--}}
                        </div>
                        <div class="form-group"><label class="col-lg-2 control-label">状态</label>
                            <div class="col-lg-10">
                                <select class="form-control" v-model="addPost.api_status">
                                    <option v-bind:value="item.value" value="${item.value}" v-for="item in status_list">
                                        ${item.text}
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group"><label class="col-lg-2 control-label">说明</label>
                            <div class="col-lg-10"><input type="text" name="version_name" v-model="addPost.api_content"
                                                          id="api_content" placeholder="说明" class="form-control"></div>
                        </div>
                        <div class="form-group"><label class="col-lg-2 control-label">请求头</label>
                            <div class="col-lg-10">
                                <table class="table table-bordered table-hover ">
                                    <thead>
                                    <tr>
                                        <th width="20%">名称</th>
                                        <th width="10%">是否必须</th>
                                        <th width="10%">类型</th>
                                        <th width="10%">默认值</th>
                                        <th width="20%">备注</th>
                                        <th width="10%">操作</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr v-for="(index, item) in addPost.api_header">
                                        <td><input type="text" v-model="item.name" class="form-control"></td>
                                        <td>
                                            <select class="form-control" v-model="item.status">
                                                <option v-bind:value="item.value" value="${item.value}"
                                                        v-for="item in null_list">${item.text}
                                                </option>
                                            </select>
                                        </td>
                                        <td>
                                            <select class="form-control" v-model="item.type">
                                                <option v-bind:value="item.value" value="${item.value}"
                                                        v-for="item in type_list">${item.text}
                                                </option>
                                            </select>
                                        </td>
                                        <td><input type="text" v-model="item.default" class="form-control"></td>
                                        <td><input type="text" v-model="item.comment" class="form-control"></td>
                                        <td>
                                            <button type="button" class="btn  btn-primary btn-xs"
                                                    v-on:click="header_remove(item)">删除
                                            </button>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                                <div class="ibox-tools">
                                    <button type="button" class="btn btn-w-m btn-primary btn-xs"
                                            v-on:click="header_add()">添加
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="form-group"><label class="col-lg-2 control-label">请求参数</label>
                            <div class="col-lg-10">
                                <table class="table table-bordered table-hover ">
                                    <thead>
                                    <tr>
                                        <th width="20%">名称</th>
                                        <th width="10%">必须</th>
                                        <th width="10%">位置</th>
                                        <th width="10%">类型</th>
                                        <th width="10%">默认值</th>
                                        <th width="20%">备注</th>
                                        <th width="10%">操作</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr v-for="item in addPost.api_request_param">
                                        <td><input type="text" v-model="item.name" class="form-control"></td>
                                        <td>
                                            <select class="form-control" v-model="item.status">
                                                <option v-bind:value="item.value" value="${item.value}"
                                                        v-for="item in null_list">${item.text}
                                                </option>
                                            </select>
                                        </td>
                                        <td>
                                            <select class="form-control" v-model="item.position">
                                                <option v-bind:value="item.value" value="${item.value}"
                                                        v-for="item in position_list">${item.text}
                                                </option>
                                            </select>
                                        </td>
                                        <td>
                                            <select class="form-control" v-model="item.type">
                                                <option v-bind:value="item.value" value="${item.value}"
                                                        v-for="item in type_list">${item.text}
                                                </option>
                                            </select>
                                        </td>
                                        <td><input type="text" v-model="item.default" class="form-control"></td>
                                        <td><input type="text" v-model="item.comment" class="form-control"></td>
                                        <td>
                                            <button type="button" class="btn  btn-primary btn-xs"
                                                    v-on:click="request_remove(item)">删除
                                            </button>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                                <div class="ibox-tools">
                                    <button type="button" class="btn btn-w-m btn-primary btn-xs"
                                            v-on:click="request_add()">添加
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="form-group"><label class="col-lg-2 control-label">返回参数</label>
                            <div class="col-lg-10">
                                <table class="table table-bordered table-hover ">
                                    <thead>
                                    <tr>
                                        <th width="20%">名称</th>
                                        <th width="20%">类型</th>
                                        <th width="20%">默认值</th>
                                        <th width="20%">备注</th>
                                        <th width="20%">操作</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr v-for="item in addPost.api_response_param">
                                        <td><input type="text" v-model="item.name" class="form-control"></td>
                                        <td>
                                            <select class="form-control" v-model="item.type">
                                                <option v-bind:value="item.value" value="${item.value}"
                                                        v-for="item in type_list">${item.text}
                                                </option>
                                            </select>
                                        </td>
                                        <td><input type="text" v-model="item.default" class="form-control"></td>
                                        <td><input type="text" v-model="item.comment" class="form-control"></td>
                                        <td>
                                            <button type="button" class="btn  btn-primary btn-xs"
                                                    v-on:click="response_remove(item)">删除
                                            </button>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                                <div class="ibox-tools">
                                    <button type="button" class="btn btn-w-m btn-primary btn-xs"
                                            v-on:click="response_add()">添加
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="form-group"><label class="col-lg-2 control-label">请求示例</label>
                            <div class="col-lg-10"><textarea v-model="addPost.api_request_content" placeholder="请求示例"
                                                             class="form-control"></textarea></div>
                        </div>
                        <div class="form-group"><label class="col-lg-2 control-label">返回示例</label>
                            <div class="col-lg-10"><textarea v-model="addPost.api_response_content" placeholder="返回示例"
                                                             class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="form-group"><label class="col-lg-2 control-label">错误码</label>
                            <div class="col-lg-10">
                                <textarea v-model="addPost.api_error_code" placeholder="错误码"
                                          class="form-control"></textarea></div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                    <button type="button" v-on:click="add_submit()" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal inmodal" id="modal_update" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content animated fadeIn">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span
                                aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" id="add_form" method="post" action=>
                        <div class="form-group"><label class="col-lg-2 control-label">名称</label>
                            <div class="col-lg-10"><input type="text" name="version_name" v-model="post.api_name"
                                                         id="api_name" placeholder="名称" class="form-control"></div>
                        </div>
                        <div class="form-group"><label class="col-lg-2 control-label">编号</label>
                            <div class="col-lg-10"><input type="text" name="api_sort" v-model="post.api_sort"
                                                          id="api_sort" placeholder="编号" class="form-control"></div>
                        </div>
                        <div class="form-group"><label class="col-lg-2 control-label">url</label>
                            <div class="col-lg-10"><input type="text" name="version_name" v-model="post.api_url"
                                                         id="api_url" placeholder="url" class="form-control"></div>
                        </div>
                        <div class="form-group"><label class="col-lg-2 control-label">方法</label>
                            <div class="col-lg-10">
                                <select class="form-control" v-model="post.api_method">
                                    <option v-bind:value="item.value"  value="${item.value}"
                                            v-for="item in method_list">${item.text}
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group"><label class="col-lg-2 control-label">状态</label>
                            <div class="col-lg-10">
                                <select class="form-control" v-model="post.api_status">
                                    <option v-bind:value="item.value"  value="${item.value}"
                                            v-for="item in status_list">${item.text}
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group"><label class="col-lg-2 control-label">说明</label>
                            <div class="col-lg-10"><input type="text" name="version_name" v-model="post.api_content"
                                                         id="api_content" placeholder="说明" class="form-control"></div>
                        </div>
                        <div class="form-group"><label class="col-lg-2 control-label">请求头</label>
                            <div class="col-lg-10">
                                <table class="table table-bordered table-hover ">
                                    <thead>
                                    <tr>
                                        <th width="20%">名称</th>
                                        <th width="10%">是否必须</th>
                                        <th width="10%">类型</th>
                                        <th width="10%">默认值</th>
                                        <th width="20%">备注</th>
                                        <th width="10%">操作</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr v-for="item in post.api_header">
                                        <td><input type="text" v-model="item.name" class="form-control"></td>
                                        <td>
                                            <select class="form-control" v-model="item.status">
                                                <option v-bind:value="item.value" value="${item.value}"
                                                        v-for="item in null_list">${item.text}
                                                </option>
                                            </select>
                                        </td>
                                        <td>
                                            <select class="form-control" v-model="item.type">
                                                <option v-bind:value="item.value" value="${item.value}"
                                                        v-for="item in type_list">${item.text}
                                                </option>
                                            </select>
                                        </td>
                                        <td><input type="text" v-model="item.default" class="form-control"></td>
                                        <td><input type="text" v-model="item.comment" class="form-control"></td>
                                        <td>
                                            <button type="button" class="btn  btn-primary btn-xs"
                                                    v-on:click="update_header_remove(item)">删除
                                            </button>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                                <div class="ibox-tools">
                                    <button type="button" class="btn btn-w-m btn-primary btn-xs"
                                            v-on:click="update_header_add()">添加
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="form-group"><label class="col-lg-2 control-label">请求参数</label>
                            <div class="col-lg-10">
                                <table class="table table-bordered table-hover ">
                                    <thead>
                                    <tr>
                                        <th width="20%">名称</th>
                                        <th width="10%">必须</th>
                                        <th width="10%">位置</th>
                                        <th width="10%">类型</th>
                                        <th width="10%">默认值</th>
                                        <th width="20%">备注</th>
                                        <th width="10%">操作</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr v-for="item in post.api_request_param">
                                        <td><input type="text" v-model="item.name" class="form-control"></td>
                                        <td>
                                            <select class="form-control" v-model="item.status">
                                                <option  v-bind:value="item.value" value="${item.value}"
                                                        v-for="item in null_list">${item.text}
                                                </option>
                                            </select>
                                        </td>
                                        <td>
                                            <select class="form-control" v-model="item.position">
                                                <option v-bind:value="item.value" value="${item.value}"
                                                        v-for="item in position_list">${item.text}
                                                </option>
                                            </select>
                                        </td>
                                        <td>
                                            <select class="form-control" v-model="item.type">
                                                <option v-bind:value="item.value" value="${item.value}"
                                                        v-for="item in type_list">${item.text}
                                                </option>
                                            </select>
                                        </td>
                                        <td><input type="text" v-model="item.default" class="form-control"></td>
                                        <td><input type="text" v-model="item.comment" class="form-control"></td>
                                        <td>
                                            <button type="button" class="btn  btn-primary btn-xs"
                                                    v-on:click="update_request_remove(item)">删除
                                            </button>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                                <div class="ibox-tools">
                                    <button type="button" class="btn btn-w-m btn-primary btn-xs"
                                            v-on:click="update_request_add()">添加
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="form-group"><label class="col-lg-2 control-label">返回参数</label>
                            <div class="col-lg-10">
                                <table class="table table-bordered table-hover ">
                                    <thead>
                                    <tr>
                                        <th width="20%">名称</th>
                                        <th width="20%">类型</th>
                                        <th width="20%">默认值</th>
                                        <th width="20%">备注</th>
                                        <th width="20%">操作</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr v-for="item in post.api_response_param">
                                        <td><input type="text" v-model="item.name" class="form-control"></td>
                                        <td>
                                            <select class="form-control" v-model="item.type">
                                                <option v-bind:value="item.value" value="${item.value}"
                                                        v-for="item in type_list">${item.text}
                                                </option>
                                            </select>
                                        </td>
                                        <td><input type="text" v-model="item.default" class="form-control"></td>
                                        <td><input type="text" v-model="item.comment" class="form-control"></td>
                                        <td>
                                            <button type="button" class="btn  btn-primary btn-xs"
                                                    v-on:click="update_response_remove(item)">删除
                                            </button>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                                <div class="ibox-tools">
                                    <button type="button" class="btn btn-w-m btn-primary btn-xs"
                                            v-on:click="update_response_add()">添加
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="form-group"><label class="col-lg-2 control-label">请求示例</label>
                            <div class="col-lg-10"><textarea v-model="post.api_request_content" placeholder="请求示例"
                                                            class="form-control"></textarea></div>
                        </div>
                        <div class="form-group"><label class="col-lg-2 control-label">返回示例</label>
                            <div class="col-lg-10"><textarea v-model="post.api_response_content" placeholder="返回示例"
                                                            class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="form-group"><label class="col-lg-2 control-label">错误码</label>
                            <div class="col-lg-10">
                                <textarea v-model="post.api_error_code" placeholder="错误码"
                                          class="form-control"></textarea></div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-white " data-dismiss="modal">Close</button>
                    <button type="button" v-on:click="update_submit()" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

@stop
<template id="child-template">
    <select class="form-control">
        <option value="${item.value}" v-for="item in list">${item.text}</option>
    </select>
</template>
@section('js')
    <script src={{ asset('base/js/select2.full.min.js') }}></script>
    <script>
        /*var select2 = Vue.extend({
         template: '#child-template',
         data: function () {
         return {}
         },
         methods: {},
         ready: function () {
         var _this = this;
         if (this.multiple) {
         $(this.$el).attr('multiple', 'multiple');
         }

         _this.$dispatch('selec2_value', [_this.nam, $(this.$el).val()]);
         $(this.$el).select2().on('change', function () {

         _this.$dispatch('selec2_value', function(){
         _this.obj=$(this).val();
         })
         /!* _this.$dispatch('selec2_value', [_this.nam, $(this).val()]);*!/
         });
         },
         props: ['list', 'multiple', 'obj','nam']
         })
         Vue.component('select2', select2);*/


        Vue.config.devtools = true
        Vue.config.delimiters = ['${', '}']
        new Vue({
            el: '#app',
            watch: {},
            data: {
                method_list: [{value: '请选择', text: '请选择'}, {value: 'get', text: 'get'}, {value: 'post', text: 'post'}, {
                    value: 'put',
                    text: 'put'
                }, {value: 'delete', text: 'delete'}],
                status_list: [{value: '请选择', text: '请选择'}, {value: '1', text: '正常'}, {value: '2', text: '测试'},{value: '3', text: '新增'},{value: '4', text: '有改动'}],
                type_list: [{value: '请选择', text: '请选择'}, {value: 'string', text: 'string'}, {
                    value: 'ini',
                    text: 'ini'
                },{value: 'double', text: 'double'}, {value: 'json', text: 'json'}, {value: 'array', text: 'array'},{value: '其他', text: '其他'}],
                null_list: [{value: '请选择', text: '请选择'}, {value: '是', text: '是'}, {value: '否', text: '否'}],
                position_list: [{value: '请选择', text: '请选择'}, {value: 'url', text: 'url'}, {value: '普通', text: '普通'}],
                projectName: "{{ $project_name }}",
                versionName: "{{ $version_name }}",
                aaa: 'false',
                addAction: "{{ url('admin/api') }}",
                copyAction: "{{ url('admin/api/copy') }}",
                copyPost: {
                    api_id: 0,
                    api_name: '',
                    api_url:''
                },
                addPost: {
                    version_id: "{{ $version_id }}",
                    api_name: '',
                    api_sort: 0,
                    api_content: '',
                    api_status: '1',
                    api_url: "{{ $project_api_url }}/{{ $version_name }}",
                    api_method: 'get',
                    api_header: [{"name":"token","status":"是","default":"","type":"string","comment":""},{"name":"sign","status":"是","default":"","type":"string","comment":"签名"},{"name":"sign-time","status":"是","default":"","type":"string","comment":"随机字符串或者时间戳"}],
                    api_request_param: [],
                    api_response_param: [],
                    api_response_content: '',
                    api_request_content: '',
                    api_error_code: '',
                },
                updateAction: "{{ url('admin/api') }}",

                post: {
                    version_id: "{{ $version_id }}",
                    api_name: '',
                    api_sort: 0,
                    api_content: '',
                    api_status: '',
                    api_url: "{{ $project_api_url }}/{{ $version_name }}",
                    api_method: '',
                    api_header: [],
                    api_request_param: [],
                    api_response_param: [],
                    api_response_content: '',
                    api_request_content: '',
                    api_error_code: '',
                },
                deleteAction: "{{ url('admin/api') }}",

            },
            events: {},
            methods: {
                copy_button: function (obj) {

                    this.copyPost.api_id = obj.api_id;
                    this.copyPost.api_name = obj.api_name;
                    this.copyPost.api_url = obj.api_url;
                    $('#modal_copy').modal('toggle');
                },
                copy_submit: function () {

                    this.$http.post(this.copyAction, this.copyPost).then(function (data) {

                        if (data.data.code == 1) {
                            window.location.reload();
                        } else {
                            alert('添加失败');
                        }

                    }, function () {
                        alert('添加失败');
                    });
                },
                add_button: function () {
                    $('#modal_add').modal('toggle');
                },
                add_submit: function () {

                    this.$http.post(this.addAction, this.addPost).then(function (data) {

                        if (data.data.code == 1) {
                            window.location.reload();
                        } else {
                            alert('添加失败');
                        }

                    }, function () {
                        alert('添加失败');
                    });
                },
                update_button: function (obj) {
                    obj.api_header = obj.api_header ? obj.api_header : [];
                    obj.api_request_param = obj.api_request_param ? obj.api_request_param : [];
                    obj.api_response_param = obj.api_response_param ? obj.api_response_param : [];
                    this.post = obj;

                    $('#modal_update').modal('toggle');

                },
                update_submit: function () {
                    this.$http.put(this.updateAction + '/' + this.post.api_id, this.post).then(function (data) {

                        if (data.data.code == 1) {
                            window.location.reload();
                        } else {
                            alert('添加失败');
                        }

                    }, function () {
                        alert('添加失败');
                    });
                },
                delete_submit: function (obj) {
                    this.post = obj;
                    if (window.confirm('确定删除吗')) {
                        this.$http.delete(this.deleteAction + '/' + obj.api_id).then(function (data) {

                            if (data.data.code == 1) {
                                window.location.reload();
                            } else {
                                alert('添加失败');
                            }

                        }, function () {
                            alert('添加失败');
                        });
                    }

                },
                header_add: function () {

                    this.addPost.api_header.push({name: '', status: '是', default: '', type: 'string', comment: ''})
                },
                header_remove: function (obj) {
                    this.addPost.api_header.$remove(obj)
                },
                request_add: function () {

                    this.addPost.api_request_param.push({
                        name: '',
                        status: '是',
                        position: '普通',
                        default: '',
                        type: 'string',
                        comment: ''
                    })
                },
                request_remove: function (obj) {
                    this.addPost.api_request_param.$remove(obj)
                },
                response_add: function () {

                    this.addPost.api_response_param.push({
                        name: '',
                        type: 'string',
                        default: '',
                        comment: ''
                    })
                },
                response_remove: function (obj) {
                    this.addPost.api_response_param.$remove(obj)
                },
                update_header_add: function () {

                    this.post.api_header.push({name: '', status: '是', default: '', type: 'string', comment: ''})
                },
                update_header_remove: function (obj) {
                    this.post.api_header.$remove(obj)
                },
                update_request_add: function () {

                    this.post.api_request_param.push({
                        name: '',
                        status: '是',
                        position: '普通',
                        default: '',
                        type: 'string',
                        comment: ''
                    })
                },
                update_request_remove: function (obj) {
                    this.post.api_request_param.$remove(obj)
                },
                update_response_add: function () {

                    this.post.api_response_param.push({
                        name: '',
                        type: 'string',
                        default: '',
                        comment: ''
                    })
                },
                update_response_remove: function (obj) {
                    this.post.api_response_param.$remove(obj)
                },
                aaaa: function () {
                    alert(5555);
                }
            },
            ready: function () {
                $("#modal_add").on("shown.bs.modal", function () {

                })

            }
        });
    </script>



@stop

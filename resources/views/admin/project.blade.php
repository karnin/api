@extends('admin.base')
@section('css')

@stop

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>所有项目 </h5>
                    <div class="ibox-tools">
                        <button type="button" class="btn btn-w-m btn-primary" v-on:click="add_button()">添加
                        </button>
                    </div>
                </div>
                <div class="ibox-content">
                    <table class="table table-bordered table-hover ">
                        <thead>
                        <tr>
                            <th>id</th>
                            <th>项目名称</th>
                            <th>操作</th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($data as $key=>$value)
                        <tr>
                            <td>{{ $value['project_id'] }}</td>
                            <td><a href="{{ url('admin/version',[$value['project_id']]) }}">{{ $value['project_name'] }}</a></td>

                            <td>

                                <button type="button"  class="btn  btn-primary btn-xs" v-on:click="update_button({{ json_encode($value) }})">修改</button>
                                <button type="button"  class="btn  btn-primary btn-xs" v-on:click="delete_submit({{ json_encode($value) }})">删除</button>

                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    <div class="modal inmodal" id="modal_add" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content animated fadeIn">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span
                                aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                </div>
                <div class="modal-body">
                        <form class="form-horizontal" id="add_form" method="post" action=>

                            <div class="form-group"><label class="col-lg-2 control-label">项目名称</label>
                                <div class="col-lg-10"><input type="text" name="project_name" v-model="addPost.project_name" id="project_name" placeholder="项目名称" class="form-control"></div>
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
        <div class="modal-dialog">
            <div class="modal-content animated fadeIn">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span
                                aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" id="add_form" method="post" >

                        <div class="form-group"><label class="col-lg-2 control-label">项目名称</label>
                            <div class="col-lg-10"><input type="text" name="project_name"  v-model="post.project_name" id="project_name" placeholder="项目名称" class="form-control"></div>
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-white "  data-dismiss="modal">Close</button>
                    <button type="button" v-on:click="update_submit()" class="btn btn-primary">Save changes</button>
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
              newTodo: '111',
              aaa:'',
              addAction:"{{ url('admin/project') }}",
              addPost:{
                  project_name:''
              },
              updateAction:"{{ url('admin/project') }}",

              post:{

              },
              deleteAction:"{{ url('admin/project') }}",

          },
          methods:{
              add_button:function(){
                  $('#modal_add').modal('toggle');
              },
              add_submit:function(){
                this.$http.post(this.addAction,this.addPost).then(function(data){

                    if(data.data.code==1){
                        window.location.reload();
                    }else{
                        alert('添加失败');
                    }

                },function(){
                    alert('添加失败');
                });
              },
              update_button:function(obj){
                  this.post=obj;
                  $('#modal_update').modal('toggle');

              },
              update_submit:function(){
                  this.$http.put(this.updateAction+'/'+this.post.project_id,this.post).then(function(data){

                      if(data.data.code==1){
                          window.location.reload();
                      }else{
                          alert('添加失败');
                      }

                  },function(){
                      alert('添加失败');
                  });
              },
              delete_submit:function(obj){
                  this.post=obj;
                  if(window.confirm('确定删除吗')){
                      this.$http.delete(this.deleteAction+'/'+obj.project_id).then(function(data){

                          if(data.data.code==1){
                              window.location.reload();
                          }else{
                              alert('添加失败');
                          }

                      },function(){
                          alert('添加失败');
                      });
                  }

              }
          }
      });
    </script>
@stop

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

        <div class="col-lg-12" v-show="api_show">
            <div class="ibox">
                <div class="ibox-content">
                    <table class="table table-hover ">
                        <thead>
                        <tr>
                            <th width="20%">错误代码</th>
                            <th width="80%">备注</th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($data as $key=>$value)
                        <tr>
                            <td>{{ $value['error_code'] }}</td>
                            <td>{{ $value['error_comment'] }}</td>
                        </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop
@section('js')
    <script>


    </script>
@stop
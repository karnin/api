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

                <div class="ibox-content">

                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>字段</th>
                            <th>类型</th>
                            <th>空</th>
                            <th>默认</th>
                            <th>注释</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>1</td>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                            <td>@mdo</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Jacob</td>
                            <td>Thornton</td>
                            <td>@fat</td>
                            <td>@fat</td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Larry</td>
                            <td>the Bird</td>
                            <td>@twitter</td>
                            <td>@twitter</td>
                        </tr>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>


    </div>
@stop
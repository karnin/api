<?php
namespace App\Http\Controllers\Admin;



class IndexController extends AuthController
{
    public function index(){
        return \View::make('admin.index');
    }
}

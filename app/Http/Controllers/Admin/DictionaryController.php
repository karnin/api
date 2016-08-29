<?php
namespace App\Http\Controllers\Admin;



class DictionaryController extends AuthController
{
    public function index(){
        return \View::make('admin.dictionary');
    }
}

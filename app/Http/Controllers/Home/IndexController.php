<?php
namespace App\Http\Controllers\Home;



class IndexController extends Controller
{
    public function index(){
        return \View::make('home.index');
    }
}

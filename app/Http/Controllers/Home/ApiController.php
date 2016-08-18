<?php
namespace App\Http\Controllers\Home;
class ApiController extends Controller
{
    public function index()
    {
        return \View::make('home.api');
    }
}

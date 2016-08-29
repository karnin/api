<?php
namespace App\Http\Controllers\Admin;



class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
}

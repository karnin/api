<?php
namespace App\Http\Controllers\Admin;





use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(){
        return \View::make('admin.login');
    }
    public function doLogin(Request $request){
        $name=$request->get('name');
        $password=$request->get('password');

        if($name=='root'&&$password=='qwer1234'){

            \Session::set('login',1);
            return \Response::redirectTo('admin/');
        }else{
            return \Response::redirectTo('admin/login');
        }
    }
    public function logout(){
        \Session::remove('login');
        return \Response::redirectTo('admin/login');
    }
}

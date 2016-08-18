<?php
namespace App\Http\Controllers\Home;
class DictionaryController extends Controller
{
    public function index()
    {
        return \View::make('home.dictionary');
    }
}

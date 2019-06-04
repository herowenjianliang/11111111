<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
	//添加
    public function add()
    {
    	// echo "1222222111";
    	return view('user/add');
    }
    //添加执行
    public function add_do()
    {

    }
}

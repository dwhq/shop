<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class usersController extends Controller
{
    //
    public function list(){
        return view('admin.users.list');
    }

}

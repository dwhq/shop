<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\model\good;
use App\model\user;

class usersController extends Controller
{
    //
    public function list(user $user){
        $data = $user->paginate(15);
        return view('admin.users.list')
            ->with('data',$data);
    }
}

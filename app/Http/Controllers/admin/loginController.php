<?php

namespace App\Http\Controllers\admin;

use Dotenv\Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\login;

class loginController extends Controller
{
    //登陆
    public function login(login $request)
    {
        if ($request->isMethod('post')) {
                $name = $request->name;
                $password = $request->password;
//            $data['password'] = Hash::make($request->password);

                $datainfo = DB::table('admin')->where([['name', $name]])->first();
                if ($datainfo && Hash::check($request->password, $datainfo->password)) {
                    myflash('登陆成功');
                    session(['admin_id' => $datainfo->id, 'name' => $datainfo->name]);
                    return redirect('admin/index');
                } else {
                    myflash()->error('账号或密码错误');
                    return redirect()->back();
                };
            }
        }
        //退出登陆
        public
        function logOut(Request $request)
        {
            $request->session()->forget('admin_id');
            myflash()->success('退出登陆');
            return redirect('/');
        }
    }

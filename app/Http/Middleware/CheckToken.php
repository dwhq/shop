<?php

namespace App\Http\Middleware;

use App\Model\admin;
use App\Model\manage;
use Closure;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;

class CheckToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //没有登陆跳转到404页面
        //echo session('name');exit();
        $admin_id = session('admin_id');
        if ($admin_id) {
            return $next($request);
        } else {
            return redirect('./h888.php');
        }
    }
}

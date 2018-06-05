<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class uploadController extends Controller
{
    public function upload(Request $request)
    {
        $wenjian = $request->file('file');
        //是否上传成功
        if ($wenjian->isValid()) {
            //获取文件的原文件名 包括扩展名
            $yuanname = $wenjian->getClientOriginalName();

            //获取文件的扩展名
            $kuoname = $wenjian->getClientOriginalExtension();

            //获取文件的类型
            $type = $wenjian->getClientMimeType();

            //获取文件的绝对路径，但是获取到的在本地不能打开
            $path = $wenjian->getRealPath();
            //要保存的文件名 时间+扩展名
            $filename = date('Y-m-d') . '/' . md5(date('Y-m-d-H-i-s')) . '_' . uniqid() . '.' . $kuoname;
            $bool = Storage::disk('uploads')->put($filename, file_get_contents($path));
            $path = 'uploads' . $filename;//文件上传后的路径
            if ($bool) {
                $data['info'] = '上传成功';
                $data['status'] = 0;
                $data['path'] = $path;
            } else {
                $data['info'] = '上传失败';
                $data['status'] = 2;
            }
        } else {
            $data['info'] = '上传失败';
            $data['status'] = 1;
        }
        return $data;
    }
}

@extends('public.child')

@section('title', '后台首页')
@section('import')
@endsection
@section('content')
    <div class="x-body layui-anim layui-anim-up">
        <blockquote class="layui-elem-quote">欢迎管理员：
            <span class="x-red">{{session('name')}}</span>！当前时间:{{date("Y年m月d H:i:s",time())}}
        </blockquote>
        <fieldset class="layui-elem-field">
            <legend>数据统计</legend>
            <div class="layui-field-box">
                <div class="layui-col-md12">
                    <div class="layui-card">
                        <div class="layui-card-body">
                            <div class="layui-carousel x-admin-carousel x-admin-backlog" lay-anim=""
                                 lay-indicator="inside" lay-arrow="none" style="width: 100%; height: 90px;">
                                <div carousel-item="">
                                    <ul class="layui-row layui-col-space10 layui-this">
                                        <li class="layui-col-xs2">
                                            <a href="javascript:;" class="x-admin-backlog-body">
                                                <h3>会员数</h3>
                                                <p>
                                                    <cite>66</cite></p>
                                            </a>
                                        </li>
                                        <li class="layui-col-xs2">
                                            <a href="javascript:;" class="x-admin-backlog-body">
                                                <h3>商品数</h3>
                                                <p>
                                                    <cite>99</cite></p>
                                            </a>
                                        </li>
                                        <li class="layui-col-xs2">
                                            <a href="javascript:;" class="x-admin-backlog-body">
                                                <h3>文章数</h3>
                                                <p>
                                                    <cite>6766</cite></p>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </fieldset>
        <fieldset class="layui-elem-field">
            <legend>系统通知</legend>
            <div class="layui-field-box">
                <table class="layui-table" lay-skin="line">
                    <tbody>
                    <tr>
                        <td>
                            <a class="x-a" href="/" target="_blank">新版x-admin 2.0上线了</a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <a class="x-a" href="/" target="_blank">交流qq群:(519492808)</a>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </fieldset>
        <fieldset class="layui-elem-field">
            <legend>系统信息</legend>
            <div class="layui-field-box">
                <table class="layui-table">
                    <tbody>
                    {{--<tr>--}}
                        {{--<th>xxx版本</th>--}}
                        {{--<td>1.0.180420</td>--}}
                    {{--</tr>--}}
                    <tr>
                        <th>服务器地址</th>
                        <td>{{$_SERVER['SERVER_ADDR']}}</td>
                    </tr>
                    <tr>
                        <th>操作系统</th>
                        <td>{{php_uname('s').php_uname('r')}}</td>
                    </tr>
                    <tr>
                        <th>运行系统</th>
                        <td>{{PHP_OS}}</td>
                    </tr>
                    <tr>
                        <th>运行环境</th>
                        <td>{{$_SERVER ['SERVER_SOFTWARE']}}</td>
                    </tr>
                    <tr>
                        <th>PHP版本</th>
                        <td>{{PHP_VERSION}}</td>
                    </tr>
                    <tr>
                        <th>PHP运行方式</th>
                        <td>{{php_sapi_name()}}</td>
                    </tr>
                    <tr>
                        <th>MYSQL版本</th>
                        <td>{{\Illuminate\Support\Facades\DB::select("select VERSION() as version")[0]->version}}</td>
                    </tr>
                    <tr>
                        <th>上传附件限制</th>
                        <td>{{get_cfg_var ("upload_max_filesize")?get_cfg_var ("upload_max_filesize"):"不允许上传附件"}}</td>
                    </tr>
                    <tr>
                        <th>执行时间限制</th>
                        <td>{{get_cfg_var("max_execution_time")."秒 " }}</td>
                    </tr>
                    <tr>
                        <th>脚本运行占用最大内存</th>
                        <td>{{ get_cfg_var ("memory_limit")?get_cfg_var("memory_limit"):"无"}}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </fieldset>
        <fieldset class="layui-elem-field">
            <legend>开发团队</legend>
            <div class="layui-field-box">
                <table class="layui-table">
                    <tbody>
                    <tr>
                        <th>版权所有</th>
                        <td>xxxxx(xxxx)
                            <a href="http://www.xxx.com/" class='x-a' target="_blank">访问官网</a></td>
                    </tr>
                    <tr>
                        <th>开发者</th>
                        <td>马志斌(113664000@qq.com)</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </fieldset>
        <blockquote class="layui-elem-quote layui-quote-nm">感谢layui,百度Echarts,jquery,本系统由x-admin提供技术支持。</blockquote>
    </div>
@endsection
@extends('public.child')

@section('title', '后台登陆')
@section('import')
@endsection
@section('content')

    <div class="x-nav">
      <span class="layui-breadcrumb">
        <a href="">首页</a>
        <a href="">演示</a>
        <a>
          <cite>导航元素</cite></a>
      </span>
        <a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right"
           href="javascript:location.replace(location.href);" title="刷新">
            <i class="layui-icon" style="line-height:30px">ဂ</i></a>
    </div>
    <div class="x-body">
        <div class="layui-row">
            <button class="layui-btn "
                    onclick="x_admin_show('添加子栏目','{{url('admin/goods/add_category_page/0')}}')">
                <i class="layui-icon">&#xe642;</i>添加分类
            </button>
        </div>
        {{--<button class="layui-btn layui-btn-danger" onclick="delAll()"><i class="layui-icon"></i>批量删除</button>--}}
        {{--<span class="x-right" style="line-height:40px">共有数据：88 条</span>--}}
        </xblock>
        <table class="layui-table layui-form">
            <thead>
            <tr>
                <th width="20">
                    <div class="layui-unselect header layui-form-checkbox" lay-skin="primary"><i class="layui-icon">&#xe605;</i>
                    </div>
                </th>
                <th>ID</th>
                <th>栏目名</th>
                <th>排序</th>
                <th>状态</th>
                <th>操作</th>
            </thead>
            <tbody class="x-cate">
            @foreach($data as $value)
                <tr cate-id='{{$value->id}}' fid='{{$value->parent_id}}'>
                    <td>
                        <div class="layui-unselect layui-form-checkbox" lay-skin="primary" data-id=''><i
                                    class="layui-icon">&#xe605;</i></div>
                    </td>
                    <td>{{$value->id}}</td>
                    <td>
                        @if($value->levels->first())
                            <i class="layui-icon x-show" status='true'>&#xe623;</i>
                        @endif
                        {{$value->name}}
                    </td>
                    <td><input type="text" class="layui-input x-sort" name="order" value="{{$value->sort_order}}"></td>
                    <td>
                        <input type="checkbox" name="switch" lay-text="开启|停用" checked="" lay-skin="switch">
                    </td>
                    <td class="td-manage">
                        <button class="layui-btn layui-btn layui-btn-xs"
                                onclick="x_admin_show('编辑','{{url('admin/goods/alter_category_page/'.$value->id)}}')">
                            <i class="layui-icon">&#xe642;</i>编辑
                        </button>
                        @if($value->level != 3)
                            <button class="layui-btn layui-btn-warm layui-btn-xs"
                                    onclick="x_admin_show('添加子栏目','{{url('admin/goods/add_category_page/'.$value->id)}}')">
                                <i class="layui-icon">&#xe642;</i>添加子栏目
                            </button>
                        @endif
                        <button class="layui-btn-danger layui-btn layui-btn-xs" onclick="member_del(this,'要删除的id')"
                                href="javascript:;"><i class="layui-icon">&#xe640;</i>删除
                        </button>
                    </td>
                </tr>
                @foreach($value->levels as $va)
                    <tr cate-id='{{$va->id}}' fid='{{$va->parent_id}}'>
                        <td>
                            <div class="layui-unselect layui-form-checkbox" lay-skin="primary" data-id=''><i
                                        class="layui-icon">&#xe605;</i></div>
                        </td>
                        <td>{{$va->id}}</td>
                        <td>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            @if($va->levels->first())
                               <i class="layui-icon x-show" status='true'>&#xe623;</i>
                            @endif
                            {{$va->name}}
                        </td>
                        <td><input type="text" class="layui-input x-sort" name="order" value="{{$va->sort_order}}"></td>
                        <td>
                            <input type="checkbox" name="switch" lay-text="开启|停用" checked="" lay-skin="switch">
                        </td>
                        <td class="td-manage">
                            <button class="layui-btn layui-btn layui-btn-xs"
                                    onclick="x_admin_show('编辑','{{url('admin/goods/alter_category_page/'.$va->id)}}')">
                                <i class="layui-icon">&#xe642;</i>编辑
                            </button>
                            @if($va->level != 3)
                                <button class="layui-btn layui-btn-warm layui-btn-xs"
                                        onclick="x_admin_show('添加子栏目','{{url('admin/goods/add_category_page/'.$va->id)}}')">
                                    <i class="layui-icon">&#xe642;</i>添加子栏目
                                </button>
                            @endif
                            <button class="layui-btn-danger layui-btn layui-btn-xs" onclick="member_del(this,'要删除的id')"
                                    href="javascript:;"><i class="layui-icon">&#xe640;</i>删除
                            </button>
                        </td>
                    </tr>
                    @foreach($va->levels as $dd)
                        <tr cate-id='{{$dd->id}}' fid='{{$dd->parent_id}}'>
                            <td>
                                <div class="layui-unselect layui-form-checkbox" lay-skin="primary" data-id=''><i
                                            class="layui-icon">&#xe605;</i></div>
                            </td>
                            <td>{{$dd->id}}</td>
                            <td>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;├
                                {{$dd->name}}
                            </td>
                            <td><input type="text" class="layui-input x-sort" name="order"
                                       value="{{$value->sort_order}}"></td>
                            <td>
                                <input type="checkbox" name="switch" lay-text="开启|停用" checked="" lay-skin="switch">
                            </td>
                            <td class="td-manage">
                                <button class="layui-btn layui-btn layui-btn-xs"
                                        onclick="x_admin_show('编辑','{{url('admin/goods/alter_category_page/'.$value->id)}}')">
                                    <i class="layui-icon">&#xe642;</i>编辑
                                </button>
                                @if($dd->level != 3)
                                    <button class="layui-btn layui-btn-warm layui-btn-xs"
                                            onclick="x_admin_show('添加子栏目','{{url('admin/goods/add_category_page/'.$value->id)}}')">
                                        <i class="layui-icon">&#xe642;</i>添加子栏目
                                    </button>
                                @endif
                                <button class="layui-btn-danger layui-btn layui-btn-xs"
                                        onclick="member_del(this,'要删除的id')"
                                        href="javascript:;"><i class="layui-icon">&#xe640;</i>删除
                                </button>
                            </td>
                        </tr>
                    @endforeach
                @endforeach
            @endforeach
            </tbody>
        </table>
    </div>
    <style type="text/css">

    </style>
    <script>
        layui.use(['form'], function () {
            form = layui.form;

        });

        /*用户-删除*/
        function member_del(obj, id) {
            layer.confirm('确认要删除吗？', function (index) {
                //发异步删除数据
                $(obj).parents("tr").remove();
                layer.msg('已删除!', {icon: 1, time: 1000});
            });
        }


        function delAll(argument) {

            var data = tableCheck.getData();

            layer.confirm('确认要删除吗？' + data, function (index) {
                //捉到所有被选中的，发异步进行删除
                layer.msg('删除成功', {icon: 1});
                $(".layui-form-checked").not('.header').parents('tr').remove();
            });
        }
    </script>

@endsection
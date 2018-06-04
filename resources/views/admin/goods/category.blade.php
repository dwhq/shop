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
                <i class="layui-icon">&#xe642;</i>添加子栏目
            </button>
        </div>
        <blockquote class="layui-elem-quote">每个tr 上有两个属性 cate-id='1' 当前分类id fid='0' 父级id ,顶级分类为 0，有子分类的前面加收缩图标<i
                    class="layui-icon x-show" status='true'>&#xe623;</i></blockquote>
        <xblock>
            <button class="layui-btn layui-btn-danger" onclick="delAll()"><i class="layui-icon"></i>批量删除</button>
            <span class="x-right" style="line-height:40px">共有数据：88 条</span>
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
                        @if($value->level == 1)
                            <i class="layui-icon x-show" status='true'>&#xe623;</i>
                        @elseif($value->level == 2)
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="layui-icon x-show" status='true'>&#xe623;</i>
                        @else
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;├
                        @endif
                        {{$value->name}}
                    </td>
                    <td><input type="text" class="layui-input x-sort" name="order" value="{{$value->sort_order}}"></td>
                    <td>
                        <input type="checkbox" name="switch" lay-text="开启|停用" checked="" lay-skin="switch">
                    </td>
                    <td class="td-manage">
                        <button class="layui-btn layui-btn layui-btn-xs"
                                onclick="x_admin_show('编辑','{{url('admin/goods/alter_category/'.$value->id)}}')">
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
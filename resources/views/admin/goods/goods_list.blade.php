@extends('public.child')

@section('title', '会员列表')
@section('import')
@endsection
@section('content')
    <div class="x-nav">
      <span class="layui-breadcrumb">
        <a href="javascript:;">首页</a>
        <a href="javascript:;">会员管理</a>
        <a>
          <cite>会员列表</cite></a>
      </span>
        <a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right"
           href="javascript:location.replace(location.href);" title="刷新">
            <i class="layui-icon" style="line-height:30px">ဂ</i></a>
    </div>
    <div class="x-body">
        <div class="layui-row">
            <form class="layui-form layui-col-md12 x-so">
                {{--<input class="layui-input" placeholder="开始日" name="start" id="start">--}}
                {{--<input class="layui-input" placeholder="截止日" name="end" id="end">--}}
                <input type="text" name="user_id" placeholder="请输入会员编号" value="" autocomplete="off" class="layui-input">
                <input type="text" name="username" placeholder="请输入用户名" autocomplete="off" class="layui-input">
                <button class="layui-btn" lay-submit="" lay-filter="sreach"><i class="layui-icon">&#xe615;</i></button>
            </form>
        </div>
        <xblock>
            <button class="layui-btn layui-btn-danger" onclick="delAll()"><i class="layui-icon"></i>批量删除</button>
            <button class="layui-btn" onclick="x_admin_show('添加用户','./member-add.html',600,400)"><i
                        class="layui-icon"></i>添加
            </button>
            <span class="x-right" style="line-height:40px">共有数据：88 条</span>
        </xblock>
        <table class="layui-table">
            <thead>
            <tr>
                <th>
                    <div class="layui-unselect header layui-form-checkbox" lay-skin="primary"><i class="layui-icon">&#xe605;</i>
                    </div>
                </th>
                <th>商品ID</th>
                <th>分类名称</th>
                <th>商品编号</th>
                <th>商品名称</th>
                <th>库存数量</th>
                <th>市场价</th>
                <th>本店价</th>
                <th>商品排序</th>
                <th>是否上架</th>
                <th>是否推荐</th>
                <th>是否热卖</th>
                <th>商品销量</th>
                <th>供货商</th>
                <th>操作</th>
            </tr>
            </thead>
            <tbody>
            @foreach($data as $data)
                <tr>
                    <td>
                        <div class="layui-unselect layui-form-checkbox" lay-skin="primary" data-id='2'><i
                                    class="layui-icon">&#xe605;</i></div>
                    </td>
                    <td>{{$data->goods_id}}</td>
                    <td>{{$data->cat_name}}</td>
                    <td>{{$data->goods_sn}}</td>
                    <td>{{$data->goods_name}}</td>
                    <td>{{$data->store_count}}</td>
                    <td>{{$data->market_price}}</td>
                    <td>{{$data->shop_price}}</td>
                    <td>{{$data->sort}}</td>
                    <td>
                        @if($data->is_on_sale == 1)
                            <button class="layui-btn layui-btn-normal layui-btn-sm"><i class="layui-icon">layui-icon-ok</i></button>
                        @else
                            <button class="layui-btn layui-btn-normal layui-btn-sm"><i class="layui-icon">layui-icon-close</i></button>
                        @endif
                    </td>
                    <td>
                        @if($data->is_recommend == 1)
                            <button class="layui-btn layui-btn-normal layui-btn-sm"><i class="layui-icon">layui-icon-ok</i></button>
                        @else
                            <button class="layui-btn layui-btn-normal layui-btn-sm"><i class="layui-icon">layui-icon-close</i></button>
                        @endif
                    </td>
                    <td>
                        @if($data->is_on_sale == 1)
                            <button class="layui-btn layui-btn-normal layui-btn-sm"><i class="layui-icon">layui-icon-ok</i></button>
                        @else
                            <button class="layui-btn layui-btn-normal layui-btn-sm"><i class="layui-icon">layui-icon-close</i></button>
                        @endif
                    </td>

                    <td class="td-manage">
                        <a onclick="member_stop(this,'10001')" href="javascript:;" title="启用">
                            <i class="layui-icon">&#xe601;</i>
                        </a>
                        <a title="编辑" onclick="x_admin_show('编辑','member-edit.html',600,400)" href="javascript:;">
                            <i class="layui-icon">&#xe642;</i>
                        </a>
                        <a onclick="x_admin_show('修改密码','member-password.html',600,400)" title="修改密码"
                           href="javascript:;">
                            <i class="layui-icon">&#xe631;</i>
                        </a>
                        <a title="删除" onclick="member_del(this,'要删除的id')" href="javascript:;">
                            <i class="layui-icon">&#xe640;</i>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="page">
            <div>
                {{ $data->links() }}
            </div>
        </div>

    </div>
    <script>
        layui.use('laydate', function () {
            var laydate = layui.laydate;

            //执行一个laydate实例
            laydate.render({
                elem: '#start' //指定元素
            });

            //执行一个laydate实例
            laydate.render({
                elem: '#end' //指定元素
            });
        });

        /*用户-停用*/
        function member_stop(obj, id) {
            layer.confirm('确认要停用吗？', function (index) {

                if ($(obj).attr('title') == '启用') {

                    //发异步把用户状态进行更改
                    $(obj).attr('title', '停用')
                    $(obj).find('i').html('&#xe62f;');

                    $(obj).parents("tr").find(".td-status").find('span').addClass('layui-btn-disabled').html('已停用');
                    layer.msg('已停用!', {icon: 5, time: 1000});

                } else {
                    $(obj).attr('title', '启用')
                    $(obj).find('i').html('&#xe601;');

                    $(obj).parents("tr").find(".td-status").find('span').removeClass('layui-btn-disabled').html('已启用');
                    layer.msg('已启用!', {icon: 5, time: 1000});
                }

            });
        }

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
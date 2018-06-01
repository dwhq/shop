@extends('public.child')

@section('title', '会员列表')
@section('import')
@endsection
@section('content')
    <div class="x-nav">
      <span class="layui-breadcrumb">
        <a href="javascript:;">首页</a>
        <a href="javascript:;">商品管理</a>
        <a>
          <cite>添加商家</cite></a>
      </span>
        <a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right"
           href="javascript:location.replace(location.href);" title="刷新">
            <i class="layui-icon" style="line-height:30px">ဂ</i></a>
    </div>
    <div class="layui-row">
        <hr class="hr16">
        <form class="layui-form layui-col-md6" method="post" action="{{url('admin/goods/add_daili')}}">
            <div class="layui-form-item">
                <label class="layui-form-label">商家名称:</label>
                <div class="layui-input-block">
                    <input type="text" name="account" required  lay-verify="required" placeholder="请输名称" autocomplete="off" class="layui-input">
                </div>
            </div>
            {{ csrf_field() }}
            <div class="layui-form-item">
                <label class="layui-form-label">联系人姓名:</label>
                <div class="layui-input-block">
                    <input type="text" name="user_name" required  lay-verify="required" placeholder="请输联系人姓名" autocomplete="off" class="layui-input">
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">联系方式:</label>
                <div class="layui-input-block">
                    <input type="text" name="mobile" required  lay-verify="required" placeholder="请输联系方式" autocomplete="off" class="layui-input">
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">状态</label>
                <div class="layui-input-block">
                    <input type="checkbox" name="status" value="1" title="上架" checked>
                </div>
            </div>
            <div class="layui-form-item layui-form-text">
                <label class="layui-form-label">备注</label>
                <div class="layui-input-block">
                    <textarea name="mark" placeholder="请输入内容" class="layui-textarea"></textarea>
                </div>
            </div>
            <div class="layui-form-item">
                <div class="layui-input-block">
                    <button class="layui-btn" lay-submit lay-filter="formDemo">立即提交</button>
                </div>
            </div>
        </form>
    </div>
    <script>
        //Demo
        layui.use('form', function(){
            var form = layui.form;
        });
    </script>
@endsection
@extends('public.child')

@section('title', '添加分类')
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
        <form class=" layui-col-md6" method="post" action="{{url('admin/goods/alter_category')}}">
            <div class="layui-form-item">
                <label class="layui-form-label">分类名称:11{{$data->name }}</label>
                <div class="layui-input-block">
                    <input type="text" name="name"value="{{$data->name}}" required lay-verify="required" placeholder="请输分类名称"
                           autocomplete="off"  class="layui-input">
                </div>
            </div>
            <input type="hidden" name="parent_id" value="{{$data->parent_id or 0}}">
            <input type="hidden" name="level" value="{{$data->level}}">
            <div class="layui-form-item">
                <label class="layui-form-label">分类图片:</label>
                &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
                <div class="layui-inline">
                    <input type="text" name="image" value="{{$data->image}}" lay-verify="required" placeholder="请输名称"
                           autocomplete="off" id="image" class="layui-input layui-disabled">
                </div>
                <div class="layui-inline">
                    <a class="layui-btn test layui-col-md-offset3" id="upload">上传图片</a>
                </div>
            </div>
            {{ csrf_field() }}
            <div class="layui-form-item">
                <label class="layui-form-label">排序:</label>
                <div class="layui-input-block">
                    <input type="text" name="sort_order"  required lay-verify="required" placeholder="请输联系人姓名"
                           autocomplete="off" value="{{$data->sort_order}}" class="layui-input">
                </div>
            </div>
            <input type="hidden" name="id" value="{{$id}}">
            <div class="layui-form-item">
                <label class="layui-form-label">状态</label>
                <div class="layui-input-block">
                    <input type="checkbox" name="is_show" value="1" title="上架" checked>
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
        layui.use('upload', function () {
            var upload = layui.upload;

            //执行实例
            upload.render({
                elem: '#upload',
                url: "{{url('admin/upload')}}", //必填项
                //method: 'post',  //可选项。HTTP类型，默认post
                data: {
                    '_token': "{{csrf_token()}}"
                },//可选项。额外的参数，如：{id: 123, abc: 'xxx'}
                done: function (res, index, upload) {
                    //获取当前触发上传的元素，一般用于 elem 绑定 class 的情况，注意：此乃 layui 2.1.0 新增
                    if (res.status == 0) {
                        document.querySelector('#image').value = res.path;
                    } else {
                        layer.msg('上传失败', {icon: 5});
                    }
                }
            })
        });
        //添加成功后关闭页面
        if(@json($state) == 1 ){
            window.parent.location.reload();
            parent.layer.close();
        }
    </script>
@endsection
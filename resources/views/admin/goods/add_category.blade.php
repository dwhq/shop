@extends('public.child')

@section('title', '后台登陆')
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
        <form class=" layui-col-md6" method="post" action="{{url('admin/goods/add_category')}}">
            <div class="layui-form-item">
                <label class="layui-form-label">分类名称:</label>
                <div class="layui-input-block">
                    <input type="text" name="name" required lay-verify="required" placeholder="请输分类名称"
                           autocomplete="off" class="layui-input">
                </div>
            </div>
            {{--<div class="layui-row layui-form-item">--}}
                {{--<label class="layui-form-label">上级分类</label>--}}
                {{--<div class="layui-input-block">--}}
                    {{--<div class="layui-col-md4 layui-input-inline">--}}
                        {{--<select id="one" onchange="change(this.value);" lay-filter="one">--}}
                            {{--<option>一级分类</option>--}}
                            {{--<option>一级分类</option>--}}
                            {{--<option>一级分类</option>--}}
                            {{--<option>一级分类</option>--}}
                            {{--<option>一级分类</option>--}}
                            {{--<option>一级分类</option>--}}
                            {{--<option>一级分类</option>--}}
                            {{--<option>一级分类</option>--}}
                        {{--</select>--}}
                    {{--</div>--}}
                    {{--<div class="layui-col-md4 layui-input-inline">--}}
                        {{--<select id="two" onchange="changeTow(this.value);">--}}
                            {{--<option>子分类</option>--}}
                        {{--</select>--}}
                    {{--</div>--}}
                    {{--<div class="layui-col-md4 layui-input-inline">--}}
                        {{--<select id="three" onchange="change(this.value);">--}}
                            {{--<option>子分类</option>--}}
                        {{--</select>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
            <div class="layui-form-item">
                <label class="layui-form-label">上级分类:</label>
                <div class="layui-input-block">
                    <input type="text" name="account"  value="{{$data->name}}" lay-verify="required" placeholder="请输名称"
                           autocomplete="off" class="layui-input layui-disabled">
                </div>
            </div>
            <input type="hidden" name="parent_id" value="{{$data->parent_id}}">
            <input type="hidden" name="level" value="{{$data->level}}">
            {{ csrf_field() }}
            <div class="layui-form-item">
                <label class="layui-form-label">联系人姓名:</label>
                <div class="layui-input-block">
                    <input type="text" name="user_name" required lay-verify="required" placeholder="请输联系人姓名"
                           autocomplete="off" class="layui-input">
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">排序:</label>
                <div class="layui-input-block">
                    <input type="text" name="sort_order" required lay-verify="required" placeholder="请输联系人姓名"
                           autocomplete="off" value="50" class="layui-input">
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">联系方式:</label>
                <div class="layui-input-block">
                    <input type="text" name="mobile" required lay-verify="required" placeholder="请输联系方式"
                           autocomplete="off" class="layui-input">
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">状态</label>
                <div class="layui-input-block">
                    <input type="checkbox" name="is_show" value="1" title="上架" checked>
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
        // layui.use('form', function () {
        //     let form = layui.form;
        //     form.on('select(one)', function (data) {
        //         //console.log(data.elem); //得到select原始DOM对象
        //         console.log(data.value); //得到被选中的值
        //         //console.log(data.othis); //得到美化后的DOM对象
        //          two.innerHTML = "";
        //         if (data.value == '一级分类') {
        //             let op = new Option('请选择地市', '请选择地市', false, false);
        //             two.options[0] = op;
        //         }
        //     });
        // });
    </script>
    <script>
        // layui.form.on('select(one)', function(data){
        //     console.log(22222222);
        //     console.log(data.elem); //得到select原始DOM对象
        //     console.log(data.value); //得到被选中的值
        //     console.log(data.othis); //得到美化后的DOM对象
        // });
        // layui.form().on('select(one)', function(data){
        //     console.log(data.elem); //得到select原始DOM对象
        //     console.log(data.value); //得到被选中的值
        //     console.log(data.othis); //得到美化后的DOM对象
        //     // pca.cityRender(city,data.value);
        // });
        let two = document.querySelector('#two');
        function change(src) {
            two.innerHTML = "";
            console.log(src);
            if(src == '一级分类'){
                var op = new Option('请选择地市' , '请选择地市' , false , false);
                two.options[0] = op;
            }
        }
    </script>

@endsection
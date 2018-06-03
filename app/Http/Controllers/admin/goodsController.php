<?php

namespace App\Http\Controllers\admin;

use App\Http\Requests\category;
use App\Http\Requests\daili;
use App\model\good;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class goodsController extends Controller
{
    /**
     * @param good $good
     * @return $this
     * 商品列表
     */
    public function list(good $good)
    {
        $data = $good->paginate(15);
        return view('admin.goods.goods_list')
            ->with('data', $data);
    }

    /**
     * @param Request $request
     * @param good $good
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * 添加商品
     */
    public function add_goods(Request $request, good $good)
    {
        if ($request->isMethod('post')) {

        } else {
            return view('admin.goods.add_goods');
        }
    }

    /**
     * @return $this
     * 代理列表
     */
    public function dailiList()
    {
        $where = [];
        $data = DB::table('daili')->where($where)->paginate(15);
        return view('admin.goods.daili_list')
            ->with('data', $data);
    }

    /**
     * @param Request $request
     * @param good $good
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * 添加代理商
     */
    public function add_daili(Request $request, good $good)
    {
        if ($request->isMethod('post')) {
            new daili();
            $data['account'] = $request->account;
            $data['mobile'] = $request->mobile;
            $data['user_name'] = $request->user_name;
            $data['mark'] = $request->mark;
            $data['status'] = $request->status;
            $data['add_time'] = time();
            $daili = DB::table('daili')->insertGetId($data);
            if ($daili) {
                myflash()->success('添加成功');
                return redirect('admin/goods/daili');
            } else {
                myflash()->error('添加代理商错误');
                return redirect()->back();
            }
        } else {
            return view('admin.goods.add_daili');
        }
    }

    /**
     * @param Request $request
     * @param $status
     * @return mixed
     * 更改商家状态
     */
    public function show_daili(Request $request)
    {
        if ($request->isMethod('post')) {
            $status = $request->status;
            $id = $request->id;
            if (filled($status)) {
                $daili = DB::table('daili')->where([['id', $id]])->update(['status' => $status]);
                if ($daili) {
                    $data['status'] = 1;
                    $data['info'] = '更改成功';
                } else {
                    $data['status'] = 2;
                    $data['info'] = '更改失败';
                }
            } else {
                $data['status'] = 0;
                $data['info'] = '更改失败';
            }
            return $data;
        }
    }

    public function category()
    {
        return view('admin.goods.category');
    }

    public function add_category_page()
    {
        return view('admin.goods.add_category');
    }

    public function add_category(category  $request)
    {
        $data['name'] = $request->name;
        $data['parent_id'] = $request->parent_id;//父id
        $data['sort_order'] = $request->sort_order;//顺序排序
        $data['is_show'] = $request->is_show;//是否显示
        $data['image'] = $request->image;//分类图片
        $data['is_hott'] = $request->is_hott;//是否推荐为热门分类
        $cate = DB::table('category')->insertGetId($data);
        if ($cate) {
            myflash()->success('添加分类成功');
            return redirect('admin/goods/category');
        } else {
            myflash()->error('添加分类失败');
            return redirect()->back();
        }
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class category extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',//required不能为空
            'parent_id' => 'required',
            'sort_order' => 'required',
            'is_show' => 'required',
//            'image' => 'required',
        ];
    }

    /**
     * 定义字段名中文
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'name' => '栏目名称',
            'password' => '密码',
            'code' => '验证码',
        ];
    }

    /**
     * 定义字段名中文
     *
     * @return array
     */
    public function messages()
    {
        return [
            //'tag_ids.required'=>'必须选择标签',
            'name.required' => '分类名不能为空',
            'parent_id.required' => '父id不能为空',
            'sort_order.required' => '排序不能为空',
            'is_show.required' => '状态不能为空',
//            'image.required' => '分类图片不能为空',
        ];
    }
}

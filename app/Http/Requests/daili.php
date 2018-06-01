<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class daili extends FormRequest
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
            'account' => 'required',//required不能为空
            'mobile' => 'required',
            'user_name' => 'required',
            'mark' => 'required'
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
            'account.required' => '商户名不能为空',
            'user_name.required' => '联系人不能为空',
            'mobile.required' => '联系方式不能为空',
            'mark.required' => '备注不能为空'
        ];
    }
}

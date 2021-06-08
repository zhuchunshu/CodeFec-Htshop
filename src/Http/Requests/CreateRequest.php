<?php

namespace App\Plugins\Htshop\src\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if(!get_options_setting("htshop")){
            return CodeFec_Quanxian()->_(999);
        }
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
            "name" => "required|string|unique:htshop,name",
            "cookies" => "required|string"
        ];
    }

    public function attributes()
    {
        return [
            "name" => "任务名"
        ];
    }
}

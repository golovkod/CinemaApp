<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{


    public function rules()
    {
        return [
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'f_name' => 'required|regex:/^[\pL\s\0-9]+$/u|min:3|max:20|unique:films_models',
            'f_country' => 'required|alpha|min:3|max:20',
            'f_res' => 'required|regex:/^[\pL\s\-]+$/u|min:5|max:20',
            'f_summa' => 'required|numeric|min:1|max:1000000000',
            'f_year' => 'required|date_format:Y',
            'f_date' => 'date_format:Y-m-d|required',
            'a_name'=>'required',
            'g_name'=>'required'
        ];
    }
}

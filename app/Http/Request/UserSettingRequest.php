<?php
/**
 * File: UserSettingRequest.php
 * Created by: Luis Alberto Concha Curay.
 * Email: luisconchacuray@gmail.com
 * Language: PHP
 * Date: 19/06/17
 * Time: 21:43
 * Project: lacc_videos
 * Copyright: 2017
 */


namespace LACC\Http\Request;


use Illuminate\Foundation\Http\FormRequest;

class UserSettingRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'password' => 'required|min:6|max:16|confirmed'
        ];
    }
}
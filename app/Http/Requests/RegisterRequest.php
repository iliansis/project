<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'name'=>'required|string|min:1|max:20',
            'email'=>'required|email',
            'pass1'=>'required|string'
        ];
    }

    public function attributes()
    {
        return[
            'name'=>'имя',
            'email'=>'email',
            'pass1'=>'пароль'
        ];
        
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReviewRequest extends FormRequest
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
           
           'score'=>'required|integer|min:1|max:10',
           'text'=>'required|string'

        ];
    }

    public function messages()
    {
        return [          
            'score.required' =>'Поле оценка обязательно для заполнения',
            'score.integer' =>'Поле оценка имеет не правильный формат',
            'text.required'=>'Поле сообщение обязательно для заполнения',
            'text.string'=>'Поле сообщение имеет не правильный формат'
        ];
        
    }
}

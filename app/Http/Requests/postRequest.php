<?php

namespace App\Http\Requests;

use App\department;
use Illuminate\Foundation\Http\FormRequest;

class postRequest extends FormRequest
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
            'title'=>'required|max:50',
            'keyword'=>'required|max:50',
            'content'=>'required',
            'department'=>'required',
        ];
    }
}

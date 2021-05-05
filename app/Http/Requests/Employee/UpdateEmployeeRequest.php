<?php

namespace App\Http\Requests\employee;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEmployeeRequest extends FormRequest
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
        'f_name' => 'required',
        'l_name' => 'required',
        'dob' => 'required',
        'mobile_no' => 'required|min:10|max:10',	
        'email' => 'required',	
        'gender' => 'required',	
        'salary' => 'required|max:10',	
        'joining_date' => 'required',	
        'passport_num' => 'required|max:20',	
        'department' => 'required',	
        'designation' => 'required'
        ];
    }
}

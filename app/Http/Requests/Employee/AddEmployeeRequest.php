<?php

namespace App\Http\Requests\Employee;

use Illuminate\Foundation\Http\FormRequest;

class AddEmployeeRequest extends FormRequest
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
        'password' => 'required|min:6|max:15',	
        'confirm_password' => 'required|required_with:password|same:password|min:6|max:15',
        'gender' => 'required',	
        'salary' => 'required|max:10',	
        'joining_date' => 'required',	
        'image' => 'required',
        'passport_doc' => 'required',
        'passport_num' => 'required|max:20',	
        'department' => 'required',	
        'designation' => 'required',
        'designation' => 'required',
        ];
    }
}
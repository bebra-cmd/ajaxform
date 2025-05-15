<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserInfoFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'number'=>'required|max:12',
            'name'=>'required|max:255',
            'email'=>'required|email|max:255',
        ];
    }
    public function messages():array
    {
        return [
            'number.required'=>'input number',
            'number.max'=>'telephone number >12 symbols',
            'name.required'=>'input name',
            'name.max'=>'name <255',
            'email.required'=>'input email',
            'email.email'=>'write correct email',
            'email.max'=>'email<255',
            
        ];
    }
}

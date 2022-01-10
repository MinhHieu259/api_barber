<?php

namespace App\Http\Requests\Web;

use Illuminate\Foundation\Http\FormRequest;

class CreateRegisterRequest extends FormRequest
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
            'username' => 'required|email',
            'password' => 'required|min:8',
            'confirmPassword' => 'required|min:8|required_with:password|same:password'
        ];
    }
    public function messages() : array
    {
        return [
            'username.required' => "Không được để trống",
            'username.email' => 'Phải là email',
            'password.required' => "Không được để trống",
            'password.min' => 'Mật khẩu trên 8 kí tự trở lên',
            'confirmPassword.required' => "Không được để trống",
            'confirmPassword.same' => 'Mật khẩu không khớp',
            'confirmPassword.min' => 'Mật khẩu phải 8 kí tự trở lên'
        ];
    }
}

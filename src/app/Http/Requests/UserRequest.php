<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class UserRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            'term' => ['required', 'digits_between:1,2'],
            'email' => ['required', 'string', 'email', Rule::unique('users')->ignore(Auth::id()), 'max:255']
        ];
    }

    public function attributes()
    {
        return [
            'name' => '名前',
            'term' => '期生',
            'email' => 'メールアドレス',
        ];
    }
}

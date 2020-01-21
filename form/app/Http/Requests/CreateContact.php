<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateContact extends FormRequest
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
        return
        [
            'name' => 'required|string|max:40',
            'email' => 'required|email|email:rfc|email:dns',
            'post' => 'required|string|max:400',
        ];
    }

    public function attributes()
    {
      return
      [
        'name' => 'お名前',
        'email' => 'メールアドレス',
        'post' => 'お問い合わせ内容',
      ];
    }
}

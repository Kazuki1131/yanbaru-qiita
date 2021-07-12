<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SearchRequest extends FormRequest
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
            'term' => 'nullable|integer|digits_between:1,2',
            'category' => 'nullable|integer|digits:1',
            'word' => 'nullable|string|max:100'
        ];
    }

    public function attributes()
    {
        return [
            'term' => '期',
            'category' => 'カテゴリー',
            'word' => '検索キーワード',
        ];
    }

    //バリデーションメッセージをオーバーライド
    public function messages()
    {
        return [
            'term.integer' => '期に不正な値が入力されました。',
            'term.digits_between' => '期は1~20で選択してください。',
            'category.integer'  => 'カテゴリーに不正な値が入力されました。',
            'category.digits'  => 'カテゴリーは選択肢の中から選んでください。',
            'word.max'  => '検索キーワードは100文字以内で入力してください。',
        ];
    }
}

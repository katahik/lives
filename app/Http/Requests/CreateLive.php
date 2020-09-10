<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateLive extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
//権限のチェック。今回は、リクエストを受け付けるからtrueの記述でok
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
//    それぞれ,inputのname属性をキーとして、ルールを記述する
    public function rules()
    {
        return [
            'title'=>'required',
            'date'=>'required',
            'venue'=>'required',
            'address'=>'required',
            'artist'=>'required',
            'min_fee'=>'required',
            'max_fee'=>'required',
        ];
    }
    public function attributes()
    {
        return [
            'title'=>'ライブ名',
            'date'=>'日にち',
            'venue'=>'会場',
            'address'=>'会場住所',
            'artist'=>'アーティスト',
            'min_fee'=>'チケット最低値',
            'max_fee'=>'チケット最高値',
        ];
    }
    public function messages()
    {
        return [
            'date.after_or_equal' => ':attribute には今日以降の日付を入力してください。',
        ];
    }
}

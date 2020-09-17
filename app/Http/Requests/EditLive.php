<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditLive extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
// 権限のチェック。今回は、リクエストを受け付けるからtrueの記述でok
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    // それぞれ,inputのname属性をキーとして、ルールを記述する
    public function rules()
    {
        return [
            'title' => 'required',
            // dateのルールにはdate(日付)であること、
            // 特定の日付と同じまたはそれ以降の日付であること(after_or_equal:today)
            'date' => 'required|date|after_or_equal:today',
            'venue' => 'required',
            'address' => 'required',
            'lat' => 'required',
            'lng' => 'required',
            'artist' => 'required',
            'min_fee' => 'required|int',
            'max_fee' => 'required|int',
        ];
    }

    public function attributes()
    {
        return [
            'title' => 'ライブ名',
            'date' => '日にち',
            'venue' => '会場',
            'address' => '会場住所',
            'lat' => '緯度',
            'lng' => '経度',
            'artist' => 'アーティスト',
            'min_fee' => 'チケット最低値',
            'max_fee' => 'チケット最高値',
        ];
    }

    public function messages()
    {
        return [
            // キーでメッセージが表示されるべきルールを指定する。
            // ドット区切りで左側が項目、右側がルールを意味する。
            'date.after_or_equal' => ':attribute には今日以降の日付を入力してください。',
            'lat.required' => '会場住所を入力後に緯度経度変換ボタンで緯度を取得してください',
            'lng.required' => '会場住所を入力後に緯度経度変換ボタンで経度を取得してください',
        ];
    }
}

<?php

namespace App\Utils;

use Illuminate\Support\Facades\Storage;


class Upload
{
    public static function uploadImage($image)
    {
        //バリデーションは呼び出し先で記述（この関数の役割が画像のアップロードのため）
        //putFileメソッドからファイルへのパスが返され、生成されたファイル名も含めたパスをデータベースへ保存。
        $filePath = Storage::disk('s3')->putFile('/', $image, 'public');
        return $filePath;
    }
}

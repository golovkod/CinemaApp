<?php
namespace App\Traits;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
trait ImageUpload
{
    public function userImageUpload($query)
    {
        $imageName = Str::random(12);
        $ext = strtolower($query->getClientOriginalExtension());
        $imageFullName = $imageName.'.'.$ext;
        $uploadPath = 'image/';
        $imageUrl = $uploadPath.$imageFullName;
        $success = $query->move($uploadPath, $imageFullName);
        return $imageUrl;
    }
}

<?php

use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

function uploadPostImage($image)
{
    $imageHash = $image->hashName();
    return Image::make($image)->resize(1000, 666, function ($constraint) {
        $constraint->aspectRatio();
    })->save(public_path('uploads/posts_images/'.$imageHash));
}

function deleteOldImage($image)
{
    return Storage::disk('public_uploads')->delete('/posts_images/'.$image);
}

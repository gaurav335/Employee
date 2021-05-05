<?php

use App\Models\User;

if ( ! function_exists('uploadFile'))
{
    function uploadFile($file, $dir)
    {
        if ($file) {

            $destinationPath =  storage_path('app/public'). DIRECTORY_SEPARATOR . $dir . DIRECTORY_SEPARATOR;

            $media_image = $file->hashName();

            $file->move($destinationPath, $media_image);

            return $media_image;
        }
    }
}

function getUserData($id)
{
    $user = User::find($id);
    if($user)
        return User::select(['id', 'name', 'email'])->find($user->id);
    return null;
}



?>

<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

function storeImage(Request $request, string $directory)
{
    // 1- Get image
    $image = $request->image;

    // 2- Change its current name
    $newImageName = time() . '-' . $image->getClientOriginalName();

    // 3- Move image to the specified directory in the project
    $image->storeAs($directory, $newImageName, 'public');

    // 4- Return the new image name
    return $newImageName;
}

// function updateImage(Request $request, string $directory, $model)
// {
//     $validatedData = $request->validated();

//     // chekc photo is found or not  => if has image uploading... or isn't imgage updated

//     if ($request->hasFile('image')) :
//         // image uploading
//         // 1- delete old image
//         Storage::delete("public/$directory/{$model->image}");
//         // 2- get imgage
//         $image = $request->image;
//         // 3- change it's current name
//         $newImageName = time() . '-' . $image->getClientOriginalName();
//         // 4- move image to my project
//         $image->storeAs("$directory", $newImageName, 'public');
//         // 5- save new name to database record
//         $validatedData['image'] = $newImageName;
//     endif;
// }

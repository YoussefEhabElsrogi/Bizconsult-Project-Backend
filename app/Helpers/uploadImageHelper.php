<?php

use Illuminate\Database\Eloquent\Model;
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
function updateImage(Request $request, string $directory, Model $model): ?string
{
    if ($request->hasFile('image')) {
        // Delete the old image
        Storage::delete("public/$directory/{$model->image}");

        // Get the new image
        $image = $request->file('image');

        // Change the current name of the image
        $newImageName = time() . '-' . $image->getClientOriginalName();

        // Move the image to the project directory
        $image->storeAs($directory, $newImageName, 'public');

        // Return the new image name
        return $newImageName;
    }

    // Return null if no image was uploaded
    return null;
}

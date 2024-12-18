<?php

namespace App\Traits;

use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

trait ImageUploadTrait
{
    public function doUploadImage($path, $file, $dimensions):string
    {
        $loginUser = auth()->user();
        $extension = $file->getClientOriginalExtension();
        $imageName = Carbon::now()->timestamp . '_' . uniqid(). '_' . $loginUser->id . '.' . $extension;
        Storage::disk('local')->put($path . '/'. $imageName, Image::make($file)->encode($extension));
        foreach ($dimensions as $dimension) { // resize & upload thumbnail image
            $resizeImage  = Image::make($file)->resize($dimension, null, function($constraint) {
                $constraint->aspectRatio();
            })->encode($extension);

            Storage::disk('local')->put($path .'/'. $dimension . '/' .$imageName, $resizeImage );
        }

        return $imageName;
    }
}

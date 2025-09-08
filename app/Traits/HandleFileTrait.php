<?php

namespace App\Traits;

use App\Models\Image;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

trait HandleFileTrait
{
    public function uploadFile($request, $input_name, $folder, $disk, $model): ?Image
    {
        if ($request->hasFile($input_name)) {
            if (!$request->file($input_name)->isValid()) {
                return null;
            }

            $file = $request->file($input_name);
            $file_name = Str::uuid() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs($folder, $file_name, $disk);

            return $model->image()->create([
                'url' => $path,
            ]);
        }

        return null;
    }

    public function deleteImage($model, $disk = 'uploads'): void
    {
        if ($model->image) {
            Storage::disk($disk)->delete($model->image->url);
            $model->image->delete();
        }
    }
}

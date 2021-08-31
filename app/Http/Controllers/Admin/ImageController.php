<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ImageUploadRequest;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    public function post(ImageUploadRequest $request) {
        $this->authorize('upload images');

        $path = $request->file('image')->store('images', 'public');
        $url = Storage::Url($path);

        return response()->json(['location' => $url]);
    }
}

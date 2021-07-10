<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ImageUploadRequest;

class ImageController extends Controller
{
    public function post(ImageUploadRequest $request) {
        $this->authorize('upload images');

        $path = $request->file('image')->store('images', 'public');

        return response()->json(['location' => $path]);
    }
}

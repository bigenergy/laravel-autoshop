<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Image;
use Illuminate\Support\Facades\Storage;

class ImagesController extends Controller
{
    public function destroy(Request $request)
    {
        $image = Image::find($request->get('id'));

        Storage::disk('public')->delete("{$image->path}/{$image->name}");
        $image->delete();

        return response([
            'success' => true
        ]);
    }
}
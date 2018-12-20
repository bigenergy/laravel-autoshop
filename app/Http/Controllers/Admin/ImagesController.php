<?php

namespace App\Http\Controllers\Admin;

use App\Models\Image;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ImagesController extends Controller
{
    public function destroy(Request $request)
    {
        $image = Image::find($request->get('id'));

        //dd($image);
        Storage::disk('public')->delete("{$image->path}/{$image->name}");
       // Storage::delete('storage/app/public/images/products/3c5820dc16c7429ba70641f100eb6e6a1544428779.jpg');
        $image->delete();

        return response([
            'success' => true
        ]);
    }
}
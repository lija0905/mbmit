<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\GalleryPhoto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryPhotosController extends Controller
{

    public function destroy(Request $request) {

        $id = $request->input("photo_id");
        $photo_type = $request->input("photo_type");

        Helper::removePhoto(GalleryPhoto::find($id)->photo, 'gallery/'.$photo_type);

        GalleryPhoto::destroy($id);

        return response()->json(['success' => 'true', 'message' => "Slika uspešno izbrisana!"]);

    }
}

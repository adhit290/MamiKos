<?php

namespace App\Http\Controllers;

use Cloudinary\Api\Upload\UploadApi;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Exception\BadRequestException;

class UploadController extends Controller {
    public function index(Request $request)
    {
        if (!$request->hasFile('file')) {
            throw new BadRequestException();
        }

        if (!$request->file('file')->isValid()) {
            throw new BadRequestException();
        }

        $file = $request->file('file')->getRealPath();
        

        $uploadResult = (new UploadApi())->upload($file, [
            'folder' => ''.$request->segment(2),
            'discard_original_filename' => true,
        ]);

        return response()->json([
            'is_success' => true,
            'data' => $uploadResult,
        ], 200); 
    }
}

?>
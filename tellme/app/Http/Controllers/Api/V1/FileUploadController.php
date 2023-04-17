<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FileUploadController extends Controller
{


    public function storeUploads(Request $request)
    {
        $response = cloudinary()->upload($request->file('file')->getRealPath())->getSecurePath();

        dd($response);

        return back()
            ->with('success', 'File uploaded successfully');
    }
    // $fileName = $request->file('file')->getClientOriginalName();
    // $extension = $request->file('file')->extension();
    // $mime = $request->file('file')->getMimeType();
    // $clientSize = $request->file('file')->getSize();

}

<?php

namespace App\Http\Controllers;

use Cloudinary\Api\ApiUtils;
use Cloudinary\Configuration\CloudConfig;
use Illuminate\Http\Request;

class cloudinary extends Controller
{
    public static function getsignature()
    {
        $cloudinaryConfig = new CloudConfig([
            "cloud_name" => env('cloud_name'),
            "api_key" => env('api_key'),
            "api_secret" => env('api_secret')
        ]);
        $timestamp = time();
        $params =
            [
                "timestamp" => time(),
                "folder" => 'greenHope users'
            ];
        $data = ['signature' => ApiUtils::signParameters($params, $cloudinaryConfig->apiSecret), 'timestamp' => $timestamp];
        return response()->json($data, 200);
    }
  
}

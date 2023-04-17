<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePodcastRequest;
use App\Http\Resources\V1\PodcastCollection;
use App\Http\Resources\V1\PodcastResource;
use App\Models\Podcast;
use Illuminate\Http\Request;

class PodcastController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware('auth:api');
    // }

    public function index()
    {
        return new PodcastCollection(Podcast::all());
    }

    public function show(Podcast $podcast)
    {
        return new PodcastResource($podcast);
    }
    public function store(Request $request)
    {
        // dd($request->all());
        $data = $request->validate([
            'user_id' => 'required',
            'title' => 'required',
            'description' => 'required',
            'url' => 'required',
            'duration' => 'required',
            'cover' => 'required',
            'category_id' => 'required'
        ]);
        Podcast::create($data);
        return response()->json("success");
    }
}

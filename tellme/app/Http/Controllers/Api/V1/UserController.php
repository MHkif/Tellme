<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\User;
use App\Models\Podcast;
use App\Models\PlayList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Resources\V1\PodcastCollection;
use App\Http\Resources\V1\PlayListCollection;

class UserController extends Controller
{
    public function search(Request $request)
    {
        // return request('users');
        $users =  DB::table('users')->where('first_name', 'like', '%' . request('users') . '%')
            ->orWhere('last_name', 'like', '%' . request('users') . '%')
            ->orWhere('email', 'like', '%' . request('users') . '%')->get();

        return response()->json($users);
    }

    public function mypodcasts(Request $request)
    {
        $count = Podcast::where('user_id', $request->user_id)->count();
        return new PodcastCollection(Podcast::where('user_id', $request->user_id)->get());
    }
    public function myPlayLists(Request $request)
    {
        return new PlayListCollection(PlayList::where('user_id', $request->user_id)->get());
        
    }
    
}

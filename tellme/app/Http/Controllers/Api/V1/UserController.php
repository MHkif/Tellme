<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

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
}

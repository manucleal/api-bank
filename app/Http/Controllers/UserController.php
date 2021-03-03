<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


use App\Models\User;

class UserController extends Controller
{
    public function index(Request $request) {
        
        // $users = User::all()->accounts();

        $users = User::find(1)->accounts;
        // if(DB::connection()->getDatabaseName())
        // {
        //     echo "Connected sucessfully to database ".DB::connection()->getDatabaseName().".";
        // }
        return response()->json([ 'data' => $users, 'statusCode' => 200 ]);
    }

    public function login(Request $request) {
        $user = User::whereEmail($request->email)->first();

        if(!is_null($user) && Hash::check($request->password, $user->password)) {
            $user->api_token = Str::random(70);
            $user->save();

            return response()->json([ 'token' => $user->api_token, 'message' => 'Wolcome to the App' ], 200);
        }

        return response()->json([ 'error' => 'Missing data', 'message' => 'Unauthorized' ], 200);
    }

    public function logout(Request $request) {
        $user = auth()->user();
        print_r($user);die();
        $user->api_token = null;
        $user->save();
        return response()->json([ 'message' => 'Exit' ], 200);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{
    public function info($accountId)
    {
        $user = DB::table('Accounts')->where('id', $accountId)->first();
        // dd($user);
        if($user == null || $user <= '0'){
            return response()->json(['message' => 'Account with this accountId not found'], 400);
        }
        if($user == null){
            return response()->json(['message' => 'Account with this accountId not found'], 404);
        }
        if($user){
        return response()->json([
            'id' => $user->id,
            'firstName' => $user->firstName,
            'lastName' => $user->lastName,
            'email' => $user->email,
        ],200);
        }

        else{
            return response()->json(['message' => 'Invalid authorization data'], 401);
        }
    }
}

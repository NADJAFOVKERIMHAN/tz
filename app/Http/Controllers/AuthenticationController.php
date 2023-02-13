<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Account;
use Illuminate\Support\Facades\DB;

class AuthenticationController extends Controller
{
    public function create(Request $req){

        $auth = new Account();
        $auth->id = null;
        $auth->firstName = $req->input('firstName');
        $auth->lastName = $req->input('lastName');
        $auth->email = $req->input('email');
        $auth->password = $req->input('password');

        $email = DB::table('Accounts')->where('email', $auth->email)->first();
        if($email){
            return response()->json(['message' => 'email used'], 409);
        }
        if($auth->firstName == null || $auth->firstName == ''){
            return response()->json(['message' => 'null, firstName'], 400);
        }elseif($auth->lastName == null || $auth->lastName == ''){
            return response()->json(['message' => 'null, lastName'], 400);
        }elseif($auth->email == null || $auth->email == ''){
            return response()->json(['message' => 'null, email'], 400);
        }
        

        $data = $req->session()->has('id');
        // dd($data);
        if($data == False)
    {
        $auth->save();

        $req->session()->put([
            'id' => $auth->id,
            'firstName' => $auth->firstName,
            'lastName' => $auth->lastName,
            'email' => $auth->email,
            'password' => $auth->password
        ]);

        return response()->json([
            'id' => $auth->id,
            'firstName' => $auth->firstName,
            'lastName' => $auth->lastName,
            'email' => $auth->email,
            'password' => $auth->password
        ],201);
    }else{
        return response()->json(['message' => 'UserLogined'], 403);
    }
}
}

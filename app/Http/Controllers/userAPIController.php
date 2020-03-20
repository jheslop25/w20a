<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class userAPIController extends Controller
{
    public function getUsers(){
        $userCollection = \App\User::all();
        $userJson = $userCollection->toJson();
        return response()->json($userJson);
    }
}

<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function store(){
        $data = request()->validate([
            'name' => 'required',
            'email' => 'required',
        ]);

        $user = User::where('email', $data['email'])->first();
        
        if($user){
            $user->name = $data['name'];
        }else{
            $user = new User($data);
        }

        if($user->save()){
            return response()->json(['success' => 'User saved successfully']);
        }

        return response()->json(['error' => 'Something went wrong'], 500);
    }
}

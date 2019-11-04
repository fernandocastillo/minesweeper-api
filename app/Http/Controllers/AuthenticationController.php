<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use App\Events\UserRegisteredEvent;

class AuthenticationController extends Controller
{
    //

    public function register(RegisterRequest $request){
        $user = User::create([
            'email'     => $request->email,
            'password'  => $request->password,
            'name'      =>  $request->name
        ]);

        event(new UserRegisteredEvent($user));

        return response()->json(['message'=>'Created successfully']);
    }
}

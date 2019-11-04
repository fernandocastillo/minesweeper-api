<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use App\Events\UserRegisteredEvent;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Str;

class AuthenticationController extends Controller
{
    //

    use AuthenticatesUsers;

    /**
     * Register new user
     *
     * @param RegisterRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(RegisterRequest $request){
        $user = User::create([
            'email'     => $request->email,
            'password'  => $request->password,
            'name'      =>  $request->name
        ]);

        event(new UserRegisteredEvent($user));

        return response()->json(['message'=>'Created successfully']);
    }

    /**
     * Send the response after the user was authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    protected function sendLoginResponse(Request $request)
    {

        $this->clearLoginAttempts($request);
        $user = \Auth::user();
        $user->api_token = Str::random(60);
        $user->save();

        return response()->json(['token'=>$user->api_token]);
    }


    public function test(Request $request){
        return response()->json(['message'=>'Your api token works!']);
    }
}

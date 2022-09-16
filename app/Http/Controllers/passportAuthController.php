<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;

class passportAuthController extends Controller
{
    /**
     * @param Request $request
     * @return Response
     * @throws ValidationException
     */
    public function register(Request $request): Response
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
        ]);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

        $accessToken = $user->createToken($request->email)->access_token;

        return response(['token' => $accessToken], 200);
    }

    /**
     * @param Request $request
     * @return Response
     */
    public function login(Request $request): Response
    {
        $login_credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];
        if (auth()->attempt($login_credentials)) {
            $accessToken = auth()->user()->createToken('PassportExample@Section.io')->accessToken;
            return response(['token' => $accessToken], 200);
        }

        return response(['error' => 'UnAuthorised Access'], 401);
    }
}

<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\RegisterUserRequest;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function register(RegisterUserRequest $request)
    {
        $user = $this->userRepository->createUser($request);
        return response()->json($user, 200);
    }

    public function login(Request $request)
    {
        if(Auth::attempt($request->all())) {
            $token = Auth::user()->createToken('Personal Access Token')->accessToken;
            return response(['user' => Auth::user(), 'token' => $token]);
        }
        return response()->json(['error' => 'Invalid credentials'], 401);
    }
}

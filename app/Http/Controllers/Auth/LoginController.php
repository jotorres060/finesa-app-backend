<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\Services\UserService;
use App\Http\Requests\AuthRequest;
use App\Models\User;
use Exception;

class LoginController extends Controller
{
    public function __construct(private UserService $userService)
    {
    }

    /**
     * Handle an authentication attempt.
     *
     * @param  App\Http\Requests\AuthRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function login(AuthRequest $request)
    {
        try {
            $user = $this->userService->getByEmail($request->email);
        
            if (!$user || !Hash::check($request->password, $user->password)) {
                return response()->json(['data' => 'Credenciales inválidas'], 401);
            }
        
            $token = $user->createToken('authToken')->plainTextToken;
            return response()->json(['data' => ['user' => $user, 'token' => $token]], 200);
        } catch (Exception $e) {
            return response()->json([
                'error' => true
            ], 500);
        }
    }

    /**
     * Log the user out of the application.
     *
     * @param  App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function logout(User $user)
    {
        try {
            $user->tokens()->delete();
            return response()->json([], 200);
        } catch (Exception $e) {
            return response()->json([
                'error' => true
            ], 500);
        }
    }
}

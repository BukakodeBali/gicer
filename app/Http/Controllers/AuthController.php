<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use Auth;

class AuthController extends Controller
{
    /**
     * @param LoginRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(LoginRequest $request)
    {
        $email    = $request->input('email');
        $password = $request->input('password');
        $token    = Auth::attempt(['email' => $email, 'password' => $password]);

        $header   = 200;
        if ($token === false) {
            $response = [
                'status'=> false,
                'message'  => 'Password salah'
            ];
            $header = 401;
        } else {
            $user = User::whereEmail($email)->first();
            if ($user) {
                $response = [
                    'status'    => true,
                    'message'   => 'Login successfully',
                    'data'      => $user,
                    'token_data'=> $this->respondWithToken($token)
                ];
            } else {
                $response = [
                    'status' => false,
                    'message' => 'Opsss.. user not found'
                ];
            }
        }

        return response()->json($response, $header);
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return [
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => (int) auth()->factory()->getTTL()
        ];
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        return response()->json(auth()->user());
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth()->logout();
        return response()->json(['message' => 'Logout successfully :-)'], 200);
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClientLoginRequest;
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
                    'status'        => true,
                    'message'       => 'Login successfully',
                    'data'          => $user,
                    'token_data'    => $this->respondWithToken($token),
                    'permissions'   => $user->getAllPermissions()->pluck('name')
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

    public function clientLogin(ClientLoginRequest $request)
    {
        $username = $request->code;
        $password = $request->password;

        $user = User::where('username', $username)->first();

        if ($user) {
            $token = Auth::attempt(['email' => $user->email, 'password' => $password]);

            if ($token === false ) {
                $response = [
                    'status'=> false,
                    'message'  => 'Password salah'
                ];

                return response()->json($response, 401);
            } else {
                $response = [
                    'status'    => true,
                    'message'   => 'Login successfully',
                    'data'      => $user,
                    'token_data'=> $this->respondWithToken($token)
                ];

                return response()->json($response, 200);
            }
        }

        return $this->dataNotFound('user');
    }
}

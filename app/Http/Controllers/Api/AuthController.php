<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Helpers\ApiResponse;
use App\Http\Requests\UserLoginRequest;
use App\Http\Requests\UserRegisterRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;
use function auth;
use function bcrypt;
use function env;

class AuthController extends Controller
{
    public string $username_column;
    public string $password_column;


    public function __construct(array $attributes = [])
    {
        $this->username_column = config('services.custom.username_field');
        $this->password_column = config('services.custom.password_field');
    }


    public function register(UserRegisterRequest $request)
    {
        $user = User::create([
            'name'  => $request->input('name'),
            'email' => $request->input('email'),
            $this->username_column => $request->input($this->username_column),
            $this->password_column => bcrypt($request->input($this->password_column))
        ]);

        $token = $user->createToken(uniqid(true) . time())->plainTextToken;

        return ApiResponse::json(['user'  => $user, 'token' => $token], true, Response::HTTP_CREATED);
    }


    public function login(UserLoginRequest $request): array|JsonResponse
    {
        // Check login existance
        $user = User::where($this->username_column, $request->input($this->username_column))->first();


        // Check password matching
        if (!$user || !Hash::check($request->input($this->password_column), $user->getAuthPassword())) {
            return ApiResponse::json(null, false, Response::HTTP_FORBIDDEN, 'Bad credentials');
        }

        $token = $user->createToken(uniqid(true) . time())->plainTextToken;

        return ApiResponse::json(['user'  => $user,'token' => $token], true, Response::HTTP_OK);

    }


    public function logout(): array
    {
        auth()->user()->tokens()->delete();
        return [
            'message' => 'Logged out'
        ];
    }
}

<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\AuthServiceInterface;

class AuthController extends Controller
{
    protected $authService;

    public function __construct(AuthServiceInterface $authService)
    {
        $this->authService = $authService;
    }

    public function token(Request $request)
    {
        $token = $this->authService->token($request->all());
        return response()->api($token);
    }

    public function auth()
    {
        $data = $this->authService->auth();
        return response()->api($data);
    }
}

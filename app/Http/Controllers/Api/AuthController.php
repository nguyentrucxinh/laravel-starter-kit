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

    public function authentication(Request $request)
    {
        $token = $this->authService->authentication($request->all());
        return response()->json($token);
    }

    public function authorization()
    {
        $data = $this->authService->authorization();
        return response()->json($data);
    }
}

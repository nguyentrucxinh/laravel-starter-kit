<?php

namespace App\Services\Implement;

use App\Services\AuthServiceInterface;
use App\Repositories\UserRepositoryInterface;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
use App\Validation\UserValidationInterface;
use ApiException;
use App\Utils\HashUtils;

class AuthService implements AuthServiceInterface
{
    protected $userRepo;
    protected $userValid;

    public function __construct(UserRepositoryInterface $userRepo, UserValidationInterface $userValid)
    {
        $this->userValid = $userValid;
        $this->userRepo = $userRepo;
    }

    /* AUTH */
    public function authentication($data)
    {
        $this->userValid->authenticate($data);

        $user = $this->userRepo->findOneByFieldName('email', $data['email']);

        if (!$user) {
            throw new ApiException('user is not exist');
        }
        $password_check = HashUtils::check($data['password'], $user->password);
        if (!$password_check) {
            throw new ApiException('password is not correct');
        }

        try {
            if (!$token = JWTAuth::fromUser($user)) {
                throw new ApiException('could_not_create_token');
            }
            return $token;
        } catch (JWTException $e) {
            throw new ApiException('could_not_create_token');
        }
    }

    public function authorization()
    {
        return self::getCurrentUser();
    }

    public function getCurrentUser()
    {
        try {
            $user = JWTAuth::parseToken()->authenticate();
            if (!$user) {
                throw new ApiException('user_not_found');
            }
            return $user;
        } catch (TokenExpiredException $e) {
            throw new ApiException('token_expired');
        } catch (TokenInvalidException $e) {
            throw new ApiException('token_invalid');
        } catch (JWTException $e) {
            throw new ApiException('token_absent');
        }
    }
}

<?php

namespace App\Validation\Implement;

use Validator;
use ApiException;
use App\Validation\UserValidationInterface;

class UserValidation implements UserValidationInterface
{
    public function __construct()
    {
    }

    public function readOne($id)
    {
    }

    public function createOne($data)
    {
    }

    public function updateOne($data)
    {
    }

    public function deleteOne($id)
    {
    }

    public function authenticate($data)
    {
        $validator = Validator::make($data, [
            'email' => 'required|email|max:255',
            'password' => 'required|max:255'
        ]);

        if ($validator->fails()) {
            throw new ApiException('email or password is empty');
        }
    }
}

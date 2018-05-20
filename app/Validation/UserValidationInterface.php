<?php

namespace App\Validation;

interface UserValidationInterface extends BaseValidationInterface
{
    public function token($data);
}

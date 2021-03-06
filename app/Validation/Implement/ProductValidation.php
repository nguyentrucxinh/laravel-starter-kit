<?php

namespace App\Validation\Implement;

use App\Validation\ProductValidationInterface;
use Validator;
use ApiException;

class ProductValidation implements ProductValidationInterface
{
    public function __construct()
    {
    }

    function readOne($id) {
    }

    function createOne($data) {
        $validator = Validator::make($data, [
            'name' => 'required|max:255',
            'description' => ''
        ]);

        if ($validator->fails()) {
            throw new ApiException('Something Went Wrong.');
        }
    }

    function updateOne($data) {
    }

    function deleteOne($id) {
    }

}

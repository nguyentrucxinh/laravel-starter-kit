<?php

namespace App\Validation\Implement;

use App\Validation\ProductValidationInterface;
use Validator;

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
            throw new Exception('');
        }
    }

    function updateOne($data) {
    }

    function deleteOne($id) {
    }

}

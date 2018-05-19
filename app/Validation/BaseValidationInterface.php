<?php

namespace App\Validation;

interface BaseValidationInterface
{
    /**
     * @param $id integer
     * @return array
     */
    public function readOne($id);

    /**
     * @param $data array
     * @return array
     */
    public function createOne($data);

    /**
     * @param $data array
     * @return array
     */
    public function updateOne($data);

    /**
     * @param $id integer
     * @return array
     */
    public function deleteOne($id);
}

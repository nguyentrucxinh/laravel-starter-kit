<?php

namespace App\Services;

interface BaseServiceInterface
{
    /**
     * @return array
     */
    public function readAll();

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

<?php

namespace App\Services;

interface AuthServiceInterface
{
    /**
     * @param $data array
     * @return array
     */
    public function authentication($data);

    /**
     * @return array
     */
    public function authorization();

    /**
     * @return array
     */
    public function getCurrentUser();
}

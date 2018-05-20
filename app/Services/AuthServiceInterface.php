<?php

namespace App\Services;

interface AuthServiceInterface
{
    /**
     * @param $data array
     * @return array
     */
    public function token($data);

    /**
     * @return array
     */
    public function auth();

    /**
     * @return array
     */
    public function getCurrentUser();
}

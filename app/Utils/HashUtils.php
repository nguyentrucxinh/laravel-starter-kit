<?php

namespace App\Utils;

use Hash;

class HashUtils
{
    public static function make($string)
    {
        return Hash::make($string);
    }

    public static function check($left, $right)
    {
        return Hash::check($left, $right);
    }
}

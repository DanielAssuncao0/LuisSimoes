<?php

namespace App\JWT;

class JWT {
    /**
     * @param string $token
     * @return bool
     */
    public static function authenticated(string $token) : bool
    {
        //Assuming this token is authenticated
        return true;
    }
}
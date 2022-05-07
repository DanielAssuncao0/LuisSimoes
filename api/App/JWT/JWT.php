<?php

class JWT {
    /**
     * @param string $token
     * @return bool
     */
    public static function authenticated(string $token) : bool
    {
        //Assume this token is authenticated
        return true;
    }
}
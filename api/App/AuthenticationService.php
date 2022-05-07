<?php 

class AuthenticationService 
{
    /**
     * @param string $token
     * @return bool
     */
    public static function authenticate(/*$jwt_needed_params*/) : string
    {
        //Send to JWT info to create new token and return it
        //Store cookie session
        return "RandomToken";
    }

    /**
     * @param string $token
     * @return bool
     */
    public static function isAuthenticated(string $token) : bool
    {
        //Validate also with cookie session
        //Assume the token is authenticated
        return true;
    }
}
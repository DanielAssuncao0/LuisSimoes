<?php

namespace App\Http;

class Response 
{
    public static function json(string $message, int $status = 400, $data = null)
    {
        $data = [
            'data' => $data,
            'message' => $message,
            'statust' => $status
        ];

        return json_encode($data);
    }
}
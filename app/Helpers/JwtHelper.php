<?php

namespace App\Helpers;

use \Firebase\JWT\JWT;
use Firebase\JWT\Key;


class JwtHelper
{

    private static $apiKey = 'test'; // Replace with your secret key
    private static $issuer = 'http://localhost:8080';
    
    public static function generateToken($data, $expiry = 10)
    {
        $issuedAt = time();
        $expirationTime = $issuedAt + $expiry; // Token expiration (1 hour default)
        $payload = [
            'iat' => $issuedAt,
            'iss' => self::$issuer,
            'exp' => $expirationTime,
            'data' => $data
        ];

        return JWT::encode($payload, self::$apiKey, 'HS256');
    }



    public static function decodeToken($token)
    {
        try {
            // Use Key object for the second argument
            $decoded = JWT::decode($token, new Key(self::$apiKey, 'HS256'));
            return (array) $decoded->data;
        } catch (\Exception $e) {
            return null;
        }
    }

    // public static function decodeToken($token)
    // {
    //     try {
    //         $decoded = JWT::decode($token, self::$key, ['HS256']);
    //         return (array) $decoded->data;
    //     } catch (\Exception $e) {
    //         return null;
    //     }
    // }
}

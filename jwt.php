<?php
require 'vendor/autoload.php';

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class JwtHandler
{
    private static $secret_key = "your_secret_key";  
    private static $encrypt_algo = "HS256"; 
    private static $issuer = "500kuser.com"; 
    // Hàm tạo JWT
    public static function generateToken($data)
    {
        $issuedAt = time();
        $expiration = $issuedAt + 3600; // Thời gian hết hạn là 1 giờ

        $payload = [
            'iss' => self::$issuer,
            'iat' => $issuedAt,
            'exp' => $expiration,
            'data' => $data
        ];

        return JWT::encode($payload, self::$secret_key, self::$encrypt_algo);
    }

    // Hàm xác thực JWT
    public static function validateToken($token)
    {
        try {
            $decoded = JWT::decode($token, new Key(self::$secret_key, self::$encrypt_algo));
            return (array) $decoded->data;  
        } catch (Exception $e) {
            return ['error' => $e->getMessage()];
        }
    }
}

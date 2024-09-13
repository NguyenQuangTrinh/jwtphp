<?php
require_once 'jwt.php';

// Dữ liệu bạn muốn mã hóa vào token
$userData = [
    'userId' => 123,
    'username' => 'testuser'
];

// Tạo JWT token
$jwt = JwtHandler::generateToken($userData);
echo "JWT Token: " . $jwt;

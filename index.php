<?php
require_once 'jwt.php';

$jwtToken = "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJ5b3VyZG9tYWluLmNvbSIsImlhdCI6MTcyNjE5NzY5OCwiZXhwIjoxNzI2MjAxMjk4LCJkYXRhIjp7ImlkIjoxMjMsInVzZXJuYW1lIjoidGVzdHVzZXIifX0.R9B7V9yrhyaUepv9wC0xa6LgivhxQFAhWXV5Rca7rcs"; // Thay thế bằng token bạn nhận được

// Xác thực token
$decodedData = JwtHandler::validateToken($jwtToken);

if (isset($decodedData['error'])) {
    echo "Token không hợp lệ: " . $decodedData['error'];
} else {
    echo "Token hợp lệ. Dữ liệu: ";
    print_r($decodedData);
}

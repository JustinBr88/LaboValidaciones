<?php
session_start();
header("Content-type: image/png");

// Parámetros del captcha
$font_path = __DIR__ . '/Rubik.ttf';
$width = 140;
$height = 50;
$length = 6;
$font_size = 22;

// Generar código aleatorio (letras y números)
$chars = 'ABCDEFGHJKLMNPQRSTUVWXYZabcdefghjkmnpqrstuvwxyz23456789';
$code = '';
for ($i = 0; $i < $length; $i++) {
    $code .= $chars[rand(0, strlen($chars) - 1)];
}
$_SESSION['captcha_code'] = $code;

// Crear imagen
$image = imagecreatetruecolor($width, $height);

// Colores rústicos
$bg_color = imagecolorallocate($image, 248, 237, 201); // fondo papel viejo
$text_color = imagecolorallocate($image, 109, 67, 26);
$line_color = imagecolorallocate($image, 172, 135, 90);
$dot_color = imagecolorallocate($image, 141, 103, 44);

// Fondo
imagefilledrectangle($image, 0, 0, $width, $height, $bg_color);

// Líneas de ruido
for ($i = 0; $i < 5; $i++) {
    imageline($image, 0, rand(0, $height), $width, rand(0, $height), $line_color);
}

// Puntos de ruido
for ($i = 0; $i < 220; $i++) {
    imagesetpixel($image, rand(0, $width), rand(0, $height), $dot_color);
}

// Letras del código con ángulo y posición variables
for ($i = 0; $i < $length; $i++) {
    $angle = rand(-28, 28);
    $x = 16 + $i * 20 + rand(-2,2);
    $y = rand($height - 15, $height - 11);
    // Si tienes otro font_path, cámbialo aquí
    imagettftext($image, $font_size, $angle, $x, $y, $text_color, $font_path, $code[$i]);
}

// Borde
imagerectangle($image, 0, 0, $width-1, $height-1, $line_color);

imagepng($image);
imagedestroy($image);

?>
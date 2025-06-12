<?php
session_start();
header('Content-Type: application/json');

function test_input($data) {
    return htmlspecialchars(stripslashes(trim($data)));
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $errors = [];

    // Validación de nombre
    $name = test_input($_POST["name"] ?? '');
    if (strlen($name) < 8) {
        $errors['nombre'] = "El nombre debe tener al menos 8 caracteres.";
    } else if (!preg_match("/[A-Z]/", $name) || !preg_match("/[a-z]/", $name)) {
        $errors['nombre'] = "El nombre debe contener al menos una letra mayúscula y una minúscula.";
    }

    // Validación de email
    $email = test_input($_POST["email"] ?? '');
    if (!preg_match("/^([a-zA-Z0-9_.+-])+@(gmail\.com|hotmail\.com)$/", $email)) {
        $errors['email'] = "Solo se permiten correos de gmail.com o hotmail.com.";
    }

    // Teléfono Panamá: +507 1234-5678
    $telephone = test_input($_POST["telephone"] ?? '');
    if (!preg_match("/^\d{4}-\d{4}$/", $telephone)) {
        $errors['telefono'] = "El teléfono debe ser de Panamá: +507 1234-5678";
    }

    // Validar CAPTCHA
    $user_entered_code = $_POST['captcha'] ?? '';
    $captcha_code = $_SESSION['captcha_code'] ?? '';
    if ($captcha_code === '' || $user_entered_code === '' || $captcha_code !== $user_entered_code) {
        $errors['captcha'] = "El código CAPTCHA es incorrecto.";
    }

    // Responder
    if (!empty($errors)) {
        echo json_encode(['success' => false, 'errors' => $errors]);
    } else {
        echo json_encode(['success' => true]);
    }
    exit;
}
?>
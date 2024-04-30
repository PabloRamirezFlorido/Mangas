<?php
// comprobar que sea método POST
if (strtoupper($_SERVER['REQUEST_METHOD']) !== 'POST') {
    $_SESSION['errors'][] = 'Error desconocido';
    header('Location: /?page=register');
    exit;
}

//comprobar que el nombre sea válido
$name = trim($_POST['name']);

// comprobar que el email sea válido
$email = trim($_POST['email']);
if ($email == '') {
    $_SESSION['errors'][] = 'Correo vacío. Introduce un correo electrónico y prueba de nuevo.';
}

// comprobar que el email exista en la base de datos
if (!isset($_SESSION['errors'])) {
    global $db;
    $user = getUserByEmail($db, $email);
    if ($user === false) {
        $_SESSION['errors'][] = 'Correo no registrado. Introduce un correo electrónico válido y prueba de nuevo.';
    }
}

// comprobar que las contraseña sean iguales
$password = $_POST['password'];
$password2 = $_POST['password2'];
if ($password !== $password2) {
    $_SESSION['errors'][] = 'Las contraseñas no coinciden. Intenta de nuevo.';
}

// comprobar que la contraseña tenga al menos 12 caracteres
if (strlen($password) < MIN_PASSWORD_LENGTH) {
    $_SESSION['errors'][] = 'La contraseña debe tener al menos 12 caracteres.';
}

// comprobar que la contraseña tenga al menos un número
if (!preg_match('/[0-9]/', $password)) {
    $_SESSION['errors'][] = 'La contraseña debe tener al menos un número.';
}

// comprobar que la contraseña tenga al menos una letra en mayúscula
if (!preg_match('/[A-Z]/', $password)) {
    $_SESSION['errors'][] = 'La contraseña debe tener al menos una letra en mayúscula.';
}

// comprobar que la contraseña tenga al menos una letra en minúscula
if (!preg_match('/[a-z]/', $password)) {
    $_SESSION['errors'][] = 'La contraseña debe tener al menos una letra en minúscula.';
}

// comprobar que la contraseña tenga al menos un carácter especial
if (!preg_match('/[^a-zA-Z0-9]/', $password)) {
    $_SESSION['errors'][] = 'La contraseña debe tener al menos un carácter especial.';
}

global $db;

// actualizar la contraseña
$hash = password_hash($password, PASSWORD_BCRYPT);

$user = savenewRegister($db, $name, $hash, $email);
$_SESSION['user'] = $user;
$_SESSION['success-message'] = 'Cuenta registrada';
header('Location: /');
exit;

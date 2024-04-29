<?php
// comprobar que sea método POST
if (strtoupper($_SERVER['REQUEST_METHOD']) !== 'POST') {
    $_SESSION['errors'][] = 'Error desconocido';
    header('Location: /?page=forgpassw');
    exit;
}

// comprobar que sea acción login
if (strtolower($_POST['action']) !== 'reset') {
    $_SESSION['errors'][] = 'Acción desconocida. Prueba de nuevo.';
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

// comprobar que el token sea válido
$token = trim($_POST['token']);
if ($token == '') {
    $_SESSION['errors'][] = 'Token vacío. Intenta recuperar su cuenta de nuevo.';
}

global $db;

// comprobar que el token existe en la base de datos
if (!isset($_SESSION['errors']) or count($_SESSION['errors']) == 0) {
    $user = getUserByResetToken($db, $token);
    logger($user);
    if ($user === []) {
        $_SESSION['errors'][] = 'Lo siento pero parece que el tiempo de recuperación de cuenta ha terminado.';
    }
} else {
    logger("Session errors isset() is true but might be empty");
}

if (isset($_SESSION['errors']) and count($_SESSION['errors']) > 0) {
    header('Location: /?page=forgpassw&action=reset_form&token=' . $token);
    exit;
}

// actualizar la contraseña
$hash = password_hash($password, PASSWORD_BCRYPT);
logger("hash: $hash");
$user = updateUserPassword($db, $user['usuario_id'], $hash);
logger("user after updateUserPassword");
logger($user);

if ($user === []) {
    $_SESSION['errors'][] = 'Error al actualizar la contraseña. Intenta de nuevo.';
    $_SESSION['errors'][] = ob_start(); print_r($user); ob_end_clean();
    header('Location: /?page=forgpassw&action=reset_form&token=' . $token);
    exit;
}

// eliminar el token de la base de datos, esto borra todos los tokens de recuperación de cuenta
deleteUserResetToken($db, $user['usuario_id']);

$_SESSION['success-message'] = 'Contraseña actualizada. Ya puede entrar con su contraseña nueva.';
header('Location: /?page=login');
exit;

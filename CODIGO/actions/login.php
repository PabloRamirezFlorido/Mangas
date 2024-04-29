<?php

// comprobar que sea método POST
if (strtoupper($_SERVER['REQUEST_METHOD']) !== 'POST') {
    $_SESSION['errors'][] = 'Error desconocido';
    header('Location: /?page=login');
    exit;
}

// comprobar que sea acción login
if (strtolower($_POST['action']) !== 'login') {
    $_SESSION['errors'][] = 'Acción desconocida. Prueba de nuevo.';
}

// comprobar que el email sea válido
$email = trim($_POST['email']);
if ($email == '') {
    $_SESSION['errors'][] = 'Correo vacío. Introduce un correo electrónico y prueba de nuevo.';
}

// comprobar que el email sea válido
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $_SESSION['errors'][] = 'Correo no válido. Introduce un correo electrónico válido y prueba de nuevo.';
}

// comprobar que la contraseña no esté vacío
if (trim($_POST['password']) == '') {
    $_SESSION['errors'][] = 'Contraseña vacía. Introduce una contraseña y prueba de nuevo.';
}

if (isset($_SESSION['errors']) and count($_SESSION['errors']) > 0) {
    $_SESSION['old']['email'] = $_POST['email'];
    $_SESSION['old']['password'] = $_POST['password'];
    header('Location: /?page=login');
    exit;
}

// sin errores, vamos a loguear la persona
$redirect_to = $_REQUEST['HTTP_REFERER'] ?? '/?page=mylibrary';

global $db;
$stmt = $db->prepare('SELECT * FROM usuarios WHERE usuario_email = ?');
$stmt->bind_param('s', $email);
$stmt->execute();
$result = $stmt->get_result();
if ($result->num_rows === 1) {
    $user = $result->fetch_assoc();
    // verificar la contraseña
    if (password_verify($_POST['password'], $user['usuario_password'])) {
        unset($user['usuario_password']);
        $_SESSION['user'] = $user;
        $_SESSION['success-message'] = 'Bienvenido de vuelta';
        header('Location: ' . $redirect_to);
    } else {
        $_SESSION['errors'][] = 'Lo sentimos. El correo y la contraseña no coinciden. Vúelvelo a intentar o resetea tu contraseña.';
        header('Location: /?page=login');
    }
} else {
    $_SESSION['errors'][] = 'Lo sentimos. Había un problema a la hora de logearte. Vúelvelo a intentar o resetea tu contraseña.';
    header('Location: /?page=login');
}
exit;
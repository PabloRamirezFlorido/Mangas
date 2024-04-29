<?php
// comprobar que sea método POST
if (strtoupper($_SERVER['REQUEST_METHOD']) !== 'POST') {
    $_SESSION['errors'][] = 'Error desconocido';
    header('Location: /?page=login');
    exit;
}

// comprobar que sea acción login
if (strtolower($_POST['action']) !== 'notify') {
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

// comprobar que el email exista en la base de datos
if (!isset($_SESSION['errors'])) {
    global $db;
    $user = getUserByEmail($db, $email);
    if ($user === false) {
        $_SESSION['errors'][] = 'Correo no registrado. Introduce un correo electrónico válido y prueba de nuevo.';
    }
}

if (isset($_SESSION['errors']) and count($_SESSION['errors']) > 0) {
    $_SESSION['old']['email'] = $_POST['email'];
    header('Location: /?page=forgpassw');
    exit;
}

global $db;

// generar token
$token = bin2hex(random_bytes(32));

// buscar el usuario
$user = getUserByEmail($db, $email);
if ([] === $user) {
    $_SESSION['success-message'] = 'Usuario notificado. Si el correo corresponde a una cuenta registrada, el usuario podrá recuperar el accesso siguiendo las instrucciones indicadas en el correo. Si el correo no llega, puede ser que la dirección no corresponde a una cuenta registrada.';
    header('Location: /?page=login');
    exit;
}

// guardar token en la base de datos
if (!forgpasswSetToken($db, $user['usuario_id'], $token)) {
    $_SESSION['errors'][] = 'Error al guardar el token. Inténtalo de nuevo.';
    header('Location: /?page=forgpassw');
    exit;
}

// enviar email
$subject = 'Recuperar contraseña';
$message = 'Para recuperar tu contraseña, haz clic en el siguiente enlace: http://' . $_SERVER['HTTP_HOST'] . '/?page=forgpasswreset&action=reset_form&token=' . $token;
$headers = 'From: no-reply@' . $_SERVER['HTTP_HOST'] . "\r\n" .
    'Reply-To: no-reply@' . $_SERVER['HTTP_HOST'] . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

// guardar el email en un archivo de texto con un timestamp como nombre
$filename = 'recuperar_cuenta_' . time() . '.txt';
file_put_contents($filename, $headers . "\n" . $subject . "\n" . $message);

if (!mail($email, $subject, $message, $headers)) {
    $_SESSION['errors'][] = 'Error al enviar el correo. Inténtalo de nuevo.';
    header('Location: /?page=forgpassw');
    exit;
}

$_SESSION['success-message'] = 'Correo enviado. Revisa tu bandeja de entrada.';
header('Location: /?page=login');
exit;

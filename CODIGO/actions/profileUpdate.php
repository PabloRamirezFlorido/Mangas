<?php

// esta vacio el nombre?
if (empty(trim($_POST['name']))) {
    $errors[] = 'Introduce tu nombre e inténtalo de nuevo';
}

// si hay errores se devuelve al formulario
if (!empty($errors)) {
    $_SESSION['errors'] = $errors;
    $_SESSION['old'] = $_POST;
    header('Location: /?page=profile');
    exit;
}

// actualiza el perfil de usuario
global $db;
$stmt = $db->prepare('UPDATE usuarios SET usuario_name = ? WHERE usuario_id = ?');
$stmt->bind_param('si', $_POST['name'], $_SESSION['user']['usuario_id']);
$stmt->execute();

// obtiene el usuario actualizado
$stmt = $db->prepare('SELECT * FROM usuarios WHERE usuario_id = ?');
$stmt->bind_param('i', $_SESSION['user']['usuario_id']);
$stmt->execute();
$result = $stmt->get_result();
if ($result->num_rows === 1) {
    $user = $result->fetch_assoc();
    unset($user['usuario_password']);
    $_SESSION['user'] = $user;
    $_SESSION['success-message'] = 'Perfil actualizado';
} else {
    $_SESSION['errors'][] = 'Lo sentimos. No hemos podido actualizar el perfil. Vúelvelo a intentar.';
}
header('Location: /?page=profile');

exit;
<?php
/**
 * @file connection.php
 * @brief Archivo que se encarga de la conexión a la base de datos.
*/

global $db;

$db = new mysqli($_ENV['DB_HOST'], $_ENV['DB_USER'], $_ENV['DB_PASS'], $_ENV['DB_NAME'], $_ENV['DB_PORT']);

if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

function closeConnection($db) {
    $db->close();
}

//registrar mensajes en un archivo de registro y en el registro de errores del servidor.
function logger($msg) {
    switch (gettype($msg)) {
        case 'array':
        case 'object':
            ob_start(); 
            print_r($msg, true); 
            $msg = ob_get_clean();
            break;
        default:
            $msg = (string)$msg;
    }
    error_log($msg);
    $fp = fopen('log.txt', 'a');
    fwrite($fp, $msg . "\n");
    fclose($fp);
}

function getFirstUser($db) {
    $stmt = $db->prepare('SELECT * FROM usuarios ORDER BY usuario_id ASC LIMIT 1');
    $stmt->execute();
    return $stmt->get_result();
}

/**
 * @brief Función que obtiene un usuario por su email.
 * @param $db Conexión a la base de datos.
 * @param $email Email del usuario.
 * @return array El usuario o un array vacío si no se encuentra
 */
function getUserByEmail($db, $email) {
    $stmt = $db->prepare('SELECT * FROM usuarios WHERE usuario_email = ?');
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $results = $stmt->get_result();
    if ($results->num_rows > 0) {
        return $results->fetch_assoc();
    } else {
        return [];
    }
}

/**
 * @brief Función que obtiene un usuario por su ID.
 * @param $db Conexión a la base de datos.
 * @param $usuario_id Email del usuario.
 * @return array El usuario o un array vacío si no se encuentra, 
 */
function getUserByID($db, $usuario_id) {
    logger("getUserByID: $usuario_id");
    $stmt = $db->prepare('SELECT * FROM usuarios WHERE usuario_id = ?');
    $stmt->bind_param('i', $usuario_id);
    $stmt->execute();
    $results = $stmt->get_result();
    ob_start();
    var_dump($results);
    logger(ob_get_clean());
    if ($results->num_rows > 0) {
        return $results->fetch_assoc();
    }
    return [];
}

/**
 * @brief Función que guarda un token en la base de datos.
 * @param $db Conexión a la base de datos.
 * @param $email Email del usuario.
 * @param $token Token a guardar.
 * @return void
 * @note Hay que crear una tarea que vacíe los tokens de la base de datos cada cierto tiempo.
 */
function forgpasswSetToken($db, $user_id, $token) {
    $stmt = $db->prepare('INSERT into forgpasswTokens (token, usuario_id) VALUES (?, ?)');
    $stmt->bind_param('si', $token, $user_id);
    return $stmt->execute();
}

/**
 * @brief Función que obtiene un usuario de la base de datos.
 * @param $db Conexión a la base de datos.
 * @param $token Token a buscar.
 * @return array associative array del usuario o un array vacío si no se encuentra.
 */
function getUserByResetToken($db, $token) {
    $stmt = $db->prepare('SELECT u.* FROM forgpasswTokens f LEFT JOIN usuarios u ON f.usuario_id = u.usuario_id WHERE f.token = ? LIMIT 1');
    $stmt->bind_param('s', $token);
    $stmt->execute();
    $results = $stmt->get_result();
    logger("getUserByResetToken: $token");
    logger($results);
    if ($results->num_rows === 1) {
        return $results->fetch_assoc();
    } else {
        return [];
    }
}

/**
 * @brief Función que borra el token de reset de la cuenta de un usuario.
 * @param $db Conexión a la base de datos.
 * @param $usuario_id ID del usuario.
 * @return bool true si se ha eliminado, false si no.
 */
function deleteUserResetToken($db, $usuario_id = 0) {
    $stmt = $db->prepare('DELETE FROM forgpasswTokens WHERE usuario_id = ?');
    $stmt->bind_param('i', $usuario_id);
    return $stmt->execute();
}

/**
 * @brief Función que actualiza la contraseña de un usuario.
 * @param $db Conexión a la base de datos.
 * @param $usuario_id El ID del usuario a actualizar.
 * @param $password La nueva contraseña.
 * @return array associative array del usuario o un array vacío si no se encuentra.
 */
function updateUserPassword($db, $usuario_id, $password) {
    logger("Parameters: $usuario_id, $password");
    $stmt = $db->prepare('UPDATE usuarios SET usuario_password = ? WHERE usuario_id = ?');
    $stmt->bind_param('si', $password, $usuario_id);
    $updated = $stmt->execute();
    logger("Updated: $updated");
    if ($updated) {
        return getUserByID($db, $usuario_id);
    }
    return [];
}

/**
 * @brief Función que elimina un token de la base de datos.
 * @param $db Conexión a la base de datos.
 * @param $token Token a eliminar.
 * @return bool true si se ha eliminado, false si no.
 */
function forgpasswDeleteToken($db, $token) {
    $stmt = $db->prepare('DELETE FROM forgpasswTokens WHERE token = ?');
    $stmt->bind_param('s', $token);
    return $stmt->execute();
}

/**
 * @brief Función que guarda un nuevo registro en la base de datos.
 * @param $db Conexión a la base de datos.
 * @param $usuario_id id del usuario.
 * @return void
 */
function savenewRegister($db, $name, $password, $email) {
    $stmt = $db->prepare('INSERT into usuarios (usuario_name, usuario_password, usuario_email) VALUES (?, ?, ?)');
    $stmt->bind_param('sss', $name, $password, $email);
    $stmt->execute();
    return getUserByEmail($db, $email);
}

/**
 * @brief Función que obtiene la lista de mangas de la base de datos.
 * @param $db Conexión a la base de datos.
 * @return array associativo array del manga o un array vacío si no se encuentra.
 */
function getAllBooks($db, $usuario_id = 0) {
    if ($usuario_id > 0) {
        $stmt = $db->prepare('SELECT m.*, (SELECT COUNT(l.manga_id) FROM likes l WHERE l.manga_id = m.manga_id) as total_likes, (SELECT COUNT(*) FROM likes l WHERE l.manga_id = m.manga_id AND l.usuario_id = ?) AS liked FROM manga m order by manga_id DESC');
        $stmt->bind_param('i', $usuario_id);
    } else {
        $stmt = $db->prepare('SELECT m.*, (SELECT COUNT(l.manga_id) FROM likes l WHERE l.manga_id = m.manga_id) as total_likes FROM manga m order by manga_id DESC');
    }
    $stmt->execute();
    $results = $stmt->get_result();
    if ($results->num_rows > 0) {
        return $results;
    } else {
        return [];
    }
}

/**
 * @brief Función que obtiene el id de un manga de la base de datos.
 * @param $db Conexión a la base de datos.
 * @return array associativo array del manga o un array vacío si no se encuentra.
 */
function getOneBook($db, $manga_id, $usuario_id = 0) {
    if ($usuario_id > 0) {
        $stmt = $db->prepare('SELECT m.*, e.editorial_nombre, c.categoria_nombre, (SELECT COUNT(l.manga_id) FROM likes l WHERE l.manga_id = m.manga_id) AS total_likes, (SELECT COUNT(l.manga_id) FROM likes l WHERE l.manga_id = m.manga_id AND l.usuario_id = ?) AS liked FROM manga m LEFT JOIN editorial e ON m.editorial_id = e.editorial_id LEFT JOIN categoria c ON m.categoria_id = c.categoria_id WHERE manga_id = ?');
        $stmt->bind_param('ii', $usuario_id, $manga_id);
    } else {
        $stmt = $db->prepare('SELECT m.*, e.editorial_nombre, c.categoria_nombre, (SELECT COUNT(l.manga_id) FROM likes l WHERE l.manga_id = m.manga_id) AS total_likes FROM manga m LEFT JOIN editorial e ON m.editorial_id = e.editorial_id LEFT JOIN categoria c ON m.categoria_id = c.categoria_id WHERE manga_id = ?');
        $stmt->bind_param('i', $manga_id);
    }
    $stmt->execute();
    $results = $stmt->get_result();
    if ($results->num_rows === 1) {
        return $results->fetch_assoc();
    } else {
        return [];
    }
}

/**
 * @brief Función que inserta una fila en la tabla de likes.
 * @param $db Conexión a la base de datos.
 * @param $manga_id ID del manga.
 * @param $usuario_id ID del usuario.
 * @return bool true si se ha insertado, false si no.
 */
function insertLike($db, $manga_id, $usuario_id) {
    $stmt = $db->prepare('INSERT INTO likes (manga_id, usuario_id) VALUES (?, ?)');
    $stmt->bind_param('ii', $manga_id, $usuario_id);
    try {
        return $stmt->execute();
    } catch (Exception $e) {
        return false;
    }
}

/**
 * @brief Función que elimina una fila en la tabla de likes.
 * @param $db Conexión a la base de datos.
 * @param $manga_id ID del manga.
 * @param $usuario_id ID del usuario.
 * @return bool true si se ha eliminado, false si no.
 */
function deleteLike($db, $manga_id, $usuario_id) {
    $stmt = $db->prepare('DELETE FROM likes WHERE manga_id = ? AND usuario_id = ?');
    $stmt->bind_param('ii', $manga_id, $usuario_id);
    return $stmt->execute();
}

<?php
global $db;
// elimina el like 
$book = deleteLike($db, (int)$_POST['id'], $_SESSION['user']['usuario_id']);


<?php
global $db;
// da like al libro actual
$book = insertLike($db, (int)$_POST['id'], $_SESSION['user']['usuario_id']);


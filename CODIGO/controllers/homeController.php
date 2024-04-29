<?php
function homeShow(){
    global $db;
    $books = getAllBooks($db, $_SESSION["user"]["usuario_id"] ?? 0);
    include_once("../views/home.php");
}
homeShow();

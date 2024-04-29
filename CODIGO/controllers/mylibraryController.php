<?php
function mylibraryShow(){
    if (isset($_SESSION['user'])) {
        global $db;
        $books = getAllBooks($db, $_SESSION["user"]["usuario_id"] ?? 0);
        include_once("../views/mylibrary.php");
    } else {
        header('Location: /?page=login');
    }
}
mylibraryShow();
function mylibraryUnlike(){
    include_once("../actions/unlike.php");
}

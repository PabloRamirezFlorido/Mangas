<?php
function detailsShow(){
    global $db;
    $book = getOneBook($db, (int)$_REQUEST["id"] ?? 0, $_SESSION["user"]["usuario_id"] ?? 0);
    logger($book);
    include_once("../views/details.php");
}

function detailsLike(){
    include_once("../actions/like.php");
    detailsShow();
}

function detailsUnlike(){
    include_once("../actions/unlike.php");
    detailsShow();
}

switch($_REQUEST["action"] ?? "show"){
    case "like":
        detailsLike();
        break;
    case "unlike":
        detailsUnlike();
        break;
    default:
        detailsShow();
        break;
}
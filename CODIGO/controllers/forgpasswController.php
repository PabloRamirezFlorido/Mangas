<?php
function forgpasswShow(){
    include_once("../views/forgpassw.php");
}

function forgpasswNotify(){
    include_once("../actions/forgpasswNotify.php");
}

function forgpasswReset(){
    include_once("../actions/forgpasswReset.php");
}

switch($_REQUEST['action'] ?? 'show') {
    case 'reset':
        forgpasswReset();
        break;
    case 'notify':
        forgpasswNotify();
        break;
    case 'reset_form':
        global $db;
        $user = getUserByResetToken($db, $_GET['token']);
        if (!$user) {
            $_SESSION['errors'][] = "Token inválido";
            header("Location: /?page=forgpassw");
            exit();
        }
        include_once("../views/forgpasswReset.php");
        break;
    default:
        forgpasswShow();
        break;
}
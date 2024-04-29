<?php
function loginShow(){
    include_once("../views/login.php");
}

function loginLogin(){
    include_once("../actions/login.php");
}

function loginLogout(){
    include_once("../actions/logout.php");
}

switch ($_REQUEST['action'] ?? 'show') {
    case 'login':
        loginLogin();
        break;
    
    case 'logout':
        loginLogout();
        break;
    
    default:
        loginShow();
        break;
}
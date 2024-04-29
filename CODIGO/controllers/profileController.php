<?php
//objetivo aqui es mostrar las diferentes configuraciones del usuario

$content['page_title'] = "Perfil de usuario";

function profileShow($content) {
    include_once("../views/profile.php");
}

function profileUpdate($content) {
    include_once("../actions/profileUpdate.php");
}

$action = isset($_REQUEST['action']) ? $_REQUEST['action'] : 'show';

switch($action) {
    case 'update':
        profileUpdate($content);
        break;
    default:
        profileShow($content);
        break;
}
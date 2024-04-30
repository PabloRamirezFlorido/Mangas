<?php
function registerShow(){
    include_once("../views/register.php");
}

function registerRegister(){
    include_once("../actions/register.php");
}

switch($_REQUEST["action"] ?? "show"){
    case "register":
    registerRegister();
    break;
    default:
    registerShow();
    break;

}
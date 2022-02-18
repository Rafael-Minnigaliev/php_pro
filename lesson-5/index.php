<?php
session_start();
spl_autoload_register(function ($className){
    require_once "controller/$className.php";
});


$action = "action";
$action .= isset($_GET['act']) ? $_GET['act'] : "Index";

switch ($_GET['c']){
    case "user":
        $controller = new CUser();
        break;
    default:
        $controller = new CPage();
}

$controller->Request($action);
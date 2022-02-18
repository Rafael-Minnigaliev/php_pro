<?php
session_start();
require_once 'autoload.php';


$action = 'action';
$action .= isset($_GET['act']) ? $_GET['act'] : 'Index';

switch ($_GET['c']){
    case 'user':
        $controller = new CUser();
        break;
    case 'order':
        $controller = new COrder();
        break;
    default:
        $controller = new CPage();
}

$controller->Request($action);
<?php
include_once "Twig/Autoloader.php";
include_once "engine/connect.php";
Twig_Autoloader::register();

try {
    $sql = "SELECT * FROM images ORDER BY count DESC";
    $res = $connect->query($sql);
    while ($row = $res->fetchObject()){
        $data[] = $row;
    }
    unset($connect);

    $loader = new Twig_Loader_Filesystem('template');
    $twig = new Twig_Environment($loader);
    $template = $twig->loadTemplate('index.tmpl');

    echo $template->render(array(
        'data' => $data
    ));
} catch (Exception $e) {
    echo "Error: ".$e->getMessage();
}
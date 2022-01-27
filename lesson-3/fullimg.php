<?php
include_once "Twig/Autoloader.php";
include_once "engine/connect.php";
Twig_Autoloader::register();
$img = $_GET['img'];
$id = $_GET['id'];

if ($_GET['action'] == "edit"){
    try{
        $sql = "UPDATE images SET count = count + 1 WHERE id = $id";
        if($connect->query($sql)){
            try {
                $sql = "SELECT count FROM images WHERE id = '$id'";
                $res = $connect->query($sql);
                while ($row = $res->fetchObject()){
                    $data = $row;
                }
                unset($connect);

                $loader = new Twig_Loader_Filesystem('template');
                $twig = new Twig_Environment($loader);
                $template = $twig->loadTemplate('fullimg.tmpl');

                echo $template->render(array(
                    'img' => $img,
                    'data' => $data
                ));
            } catch (Exception $e) {
                echo "Error: ".$e->getMessage();
            }
        }
    } catch (Exception $e) {
        echo "Error: ".$e->getMessage();
    }
}


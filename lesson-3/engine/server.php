<?php
include_once "connect.php";
include_once "classSimpleImage.php";
$action = $_GET['action'];
$photo = $_FILES['photo']['name'];

if($action == "add"){
    try {
        for($i = 0; $i < count($photo); $i++){
            $sql = "INSERT INTO images(photo) VALUES('{$photo[$i]}')";
            if($connect->query($sql)){
                if(move_uploaded_file("{$_FILES['photo']['tmp_name'][$i]}", "{$_SERVER['DOCUMENT_ROOT']}/public/images/big/{$photo[$i]}")){
                    $image = new SimpleImage();
                    $image->load("{$_SERVER['DOCUMENT_ROOT']}/public/images/big/{$photo[$i]}");
                    $image->resizeToWidth(150);
                    $image->save("{$_SERVER['DOCUMENT_ROOT']}/public/images/small/{$photo[$i]}");
                }
            }
        }
        header("Location: ../index.php");
        unset($connect);
    } catch (Exception $e) {
        echo "Error: ".$e->getMessage();
    }
}


<?php
include_once "../DB.php";

$id = (int)$_POST['id'];

//$img = DB::getRow("SELECT img FROM goods WHERE id = :id", ['id' => $id]);
//if(file_exists("../public/images/goods/{$img['img']}")){
//unlink("../public/images/goods/{$img['img']}");
//}  //Удаление файлов изображений товаров. Отключено т.к. на данный момент многие товары выводять одно и то же изображение!

DB::delete("DELETE FROM goods WHERE id = :id", ['id' => $id]);

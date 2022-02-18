<?php
include_once "../DB.php";

$tel = $_POST['tel'];
$addr = $_POST['addr'];
$id = $_POST['userid'];

$info = DB::getRow("SELECT telephone, address FROM users WHERE id = :id", ['id' => $id]);

if($tel != $info['telephone'] && $addr != $info['address']){
    DB::update("UPDATE users SET telephone = :tel, address = :addr WHERE id = :id", ['tel' => $tel, 'addr' => $addr, 'id' => $id]);
    echo "Успешно!";
}elseif($tel != $info['telephone'] && $addr == $info['address']){
    DB::update("UPDATE users SET telephone = :tel WHERE id = :id", ['tel' => $tel, 'id' => $id]);
    echo "Успешно!";
}elseif($tel == $info['telephone'] && $addr != $info['address']){
    DB::update("UPDATE users SET address = :addr WHERE id = :id", ['addr' => $addr, 'id' => $id]);
    echo "Успешно!";
}




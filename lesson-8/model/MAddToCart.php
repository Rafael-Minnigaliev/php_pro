<?php
include_once "../DB.php";

$gId = (int)$_POST['gId'];
$id = is_numeric($_POST['id']) ? (int)$_POST['id'] : (string)$_POST['id'];

if(is_numeric($id)){
    $idCart = DB::getRow("SELECT id FROM cart WHERE users_id = :id AND goods_id = :gid AND status = 0", ['id' => $id, 'gid' => $gId]);
    if($idCart['id']){
        DB::update("UPDATE cart SET count = count + 1 WHERE id = :id", ['id' => $idCart['id']]);
    }else{
        DB::insert("INSERT INTO cart(goods_id, users_id) VALUES(:gid, :id)", ['gid' => $gId, 'id' => $id]);
    }

    $count = DB::getRow("SELECT sum(count) sum FROM cart WHERE users_id = :id AND status = 0", ['id' => $id]);
}else{
    $idCart = DB::getRow("SELECT id FROM cart WHERE session_id = :id AND goods_id = :gid AND users_id = 0 AND status = 0", ['id' => $id, 'gid' => $gId]);
    if($idCart['id']){
        DB::update("UPDATE cart SET count = count + 1 WHERE id = :id", ['id' => $idCart['id']]);
    }else{
        DB::insert("INSERT INTO cart(goods_id, session_id) VALUES(:gid, :id)", ['gid' => $gId, 'id' => $id]);
    }

    $count = DB::getRow("SELECT sum(count) sum FROM cart WHERE session_id = :id AND users_id = 0 AND status = 0", ['id' => $id]);
}

echo "{$count['sum']}";
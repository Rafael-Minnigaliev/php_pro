<?php
include_once "../DB.php";

$id = (int)$_POST['id'];
$userId = DB::getRow("SELECT users_id, session_id FROM cart WHERE id = :id AND status = 0", ['id' => $id]);
DB::delete("DELETE FROM cart WHERE id = :id AND status = 0", ['id' => $id]);
if($userId['users_id'] != 0){
    $count = DB::getRow("SELECT sum(count) c_sum FROM cart WHERE users_id = :id AND status = 0", ['id' => $userId['users_id']]);
    $totalPrice = DB::getRow("SELECT sum(price * cart.count) p_sum FROM cart JOIN goods ON cart.goods_id = goods.id WHERE users_id = :id AND status = 0", ['id' => $userId['users_id']]);
}else{
    $count = DB::getRow("SELECT sum(count) c_sum FROM cart WHERE session_id = :id AND users_id = 0 AND status = 0", ['id' => $userId['session_id']]);
    $totalPrice = DB::getRow("SELECT sum(price * cart.count) p_sum FROM cart JOIN goods ON cart.goods_id = goods.id WHERE session_id = :id AND users_id = 0 AND status = 0", ['id' => $userId['session_id']]);
}

echo "{$count['c_sum']} {$totalPrice['p_sum']}";


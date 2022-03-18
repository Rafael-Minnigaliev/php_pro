<?php
include_once "../DB.php";

$id = (int)$_GET['id'];
$data = DB::Select("SELECT status, orders.id FROM orders JOIN order_status ON order_status_id = order_status.id 
WHERE users_id = :id ORDER BY date DESC", ['id' => $id]);

echo json_encode($data);




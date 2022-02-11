<?php
include_once "../DB.php";

$id = (int)$_GET['id'];
$data = DB::Select("SELECT orders.id, status, date FROM orders JOIN order_status ON order_status_id = order_status.id 
WHERE users_id = :id ORDER BY date DESC", ['id' => $id]);

foreach ($data as $item):?>
    <div style="display: flex; margin-bottom: 10px;">
        <p style="width: 170px">Номер заказа:&nbsp; <?= $item['id']?></p>
        <p style="width: 250px;">Статус заказа:&nbsp; <?= $item['status']?></p>
        <p style="margin-right: 20px">Дата оформления:&nbsp; <?= $item['date']?></p>
        <a href="index.php?c=order&act=OrderInfo&id=<?= $item['id']?>">Подробнее</a>
    </div>
<?php
endforeach;?>





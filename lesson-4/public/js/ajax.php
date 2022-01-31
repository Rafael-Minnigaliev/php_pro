<?php
include_once "../../engine/connect.php";

try {
    $page = (int)$_GET['page'];
    $limit = (int)$_GET['limit'];
    $start = $page * $limit - $limit;
    $sth = $db->query("SELECT * FROM `goods` LIMIT {$start}, {$limit}");

    if($db->errorCode() != 0000){
        $er_arr = $db->errorInfo();
        echo "Error: {$er_arr[2]}";
    }

    $data = $sth->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e){
    echo "Error: {$e->getMessage()}";
}

foreach($data as $item):?>
    <li class="catalog__item">
        <img height="200" src="public/images/goods/<?= $item['img']?>" alt="photo">
        <div class="catalog__info">
            <p class="catalog__link">Название товара: <?= $item['name']?></p>
            <p class="catalog__price">Цена: <?= $item['price']?>руб.</p>
            <p>Краткая информация: <?= $item['info']?></p>
            <button class="catalog__btn">Добавить в корзину</button>
        </div>
    </li>
<?php
endforeach;
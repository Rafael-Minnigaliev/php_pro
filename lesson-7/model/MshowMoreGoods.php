<?php
include_once "../model/MCatalog.php";
include_once "../DB.php";

    $gCat = (int)$_POST['gcat'] != "" ? (int)$_POST['gcat'] : false;
    $gen = (int)$_POST['gen'] != "" ? (int)$_POST['gen'] : false;
    $page = (int)$_POST['page'];
    $start = $page * 20 - 20;
    $id = (int)$_POST['uid'] != "" ? (int)$_POST['uid'] : (string)$_POST['sid'];

    $data = MCatalog::getGoods($gCat, $gen, $start);


foreach($data as $item):?>
    <li class="catalog__item">
        <a href="index.php?c=catalog&act=GetGoodInfo&id=<?= $item['id']?>"><img height="230" src="public/images/goods/<?= $item['img']?>" alt="photo"></a>
        <div class="catalog__info">
            <a class="catalog__link" href="index.php?c=catalog&act=GetGoodInfo&id=<?= $item['id']?>"><p">Название товара: <?= $item['name']?></p></a>
            <p class="catalog__price">Цена: <?= $item['price']?>руб.</p>
            <p>Краткая информация: <?= $item['info']?></p>
            <p class="catalog__gender">Пол:&nbsp; <?= $item['gen_name']?></p>
            <p>Категория:&nbsp; <?= $item['good_cat_name']?></p>
            <button onclick="addToCart(<?= $item['id']?>, '<?= $id?>')" class="catalog__btn">Добавить в корзину</button>
        </div>
    </li>
<?php
endforeach;
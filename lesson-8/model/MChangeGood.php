<?php
include_once "../model/MCatalog.php";
include_once "../DB.php";

$id = (int)$_POST['id'];
$name = $_POST['goodName'] ? strip_tags($_POST['goodName']) : false;
$price = (int)$_POST['goodPrice'];
$info = $_POST['goodInfo'] ? strip_tags($_POST['goodInfo']) : false;
$genId = (int)$_POST['genderId'];
$goodCatId = (int)$_POST['goodCategoryId'];
$fullInfo = $_POST['goodFullInfo'] ? strip_tags($_POST['goodFullInfo']) : false;
$photoCheck = $_POST['photoCheck'] ? strip_tags($_POST['photoCheck']) : false;
$photo = $_FILES['photo']['name'];

if(!$photoCheck){
//    $img = DB::getRow("SELECT img FROM goods WHERE id = :id", ['id' => $id]);
//    if(file_exists("../public/images/goods/{$img['img']}")){
//        unlink("../public/images/goods/{$img['img']}");
//    }  //Удаление файлов изображений товаров. Отключено т.к. на данный момент многие товары выводять одно и то же изображение!

    $catId = DB::getRow("SELECT id FROM category WHERE gender_category_id = :genid AND goods_category_id = :goodid", ['genid' => $genId, 'goodid' => $goodCatId]);
    DB::update("UPDATE goods SET name = :name, img = :photo, price = :price, info = :info, full_info = :finfo, category_id = :cid WHERE id = :id",
        ['name' => $name, 'photo' => $photo, 'price' => $price, 'info' => $info, 'finfo' => $fullInfo, 'cid' => $catId['id'], 'id' => $id]);
    move_uploaded_file("{$_FILES['photo']['tmp_name']}", "{$_SERVER['DOCUMENT_ROOT']}/public/images/goods/$photo");
    $data = MCatalog::getGoodInfo($id);
}else{
    $catId = DB::getRow("SELECT id FROM category WHERE gender_category_id = :genid AND goods_category_id = :goodid", ['genid' => $genId, 'goodid' => $goodCatId]);
    DB::update("UPDATE goods SET name = :name, price = :price, info = :info, full_info = :finfo, category_id = :cid WHERE id = :id",
        ['name' => $name, 'price' => $price, 'info' => $info, 'finfo' => $fullInfo, 'cid' => $catId['id'], 'id' => $id]);
    $data = MCatalog::getGoodInfo($id);
}
?>


<img height="230" src="public/images/goods/<?= $data['img']?>" alt="photo">
<div class="catalog__info">
    <p class="catalog__link">Название товара: <?= $data['name']?></p>
    <p class="catalog__price">Цена: <?= $data['price']?>руб.</p>
    <p>Краткая информация: <?= $data['info']?></p>
    <p class="catalog__gender">Пол:&nbsp; <?= $data['gen_name']?></p>
    <p>Категория:&nbsp; <?= $data['good_cat_name']?></p>
    <button onclick="changeForm(<?= $data['id']?>)" style="margin: 10px 0">Изменить</button><br>
    <button onclick="deleteGood(<?= $data['id']?>)">Удалить</button>
</div>








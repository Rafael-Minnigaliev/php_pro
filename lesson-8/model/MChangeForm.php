<?php
include_once "../model/MCatalog.php";
include_once "../DB.php";

$id = (int)$_POST['id'];
$data = MCatalog::getGoodInfo($id);
?>


    <form id="good_form" class="good_form" goodId="<?= $id?>">
        <input type="hidden" name="id" value="<?= $id?>">
        <label>Название: <input class="good_form__item" type="text" name="goodName" value="<?= $data['name']?>" required></label><br>
        <label>Цена: <input class="good_form__item good_form__item_price" type="number" name="goodPrice" value="<?= $data['price']?>" required></label><br>
        <label>Краткое описание: <input class="good_form__item" type="text" name="goodInfo" value="<?= $data['info']?>" required></label><br>
        Пол:
        <select class="good_form__item" name="genderId" required>
            <option value="<?= $data['gender_category_id']?>" selected><?= $data['gen_name']?></option>
            <option value="1">Женский</option>
            <option value="2">Мужской</option>
            <option value="3">Унисекс</option>
        </select><br>
        Категория:
        <select class="good_form__item" name="goodCategoryId" required>
            <option value="<?= $data['goods_category_id']?>" selected><?= $data['good_cat_name']?></option>
            <option value="1">Одежда</option>
            <option value="2">Аксессуары</option>
            <option value="3">Обувь</option>
            <option value="4">Рюкзаки и сумки</option>
        </select>
        <p>Описание: </p>
        <textarea class="good_form__item" name="goodFullInfo" cols="60" rows="4" required><?= $data['full_info']?></textarea><br>
        <input class="good_form__item" type="file" id="photo" name="photo" accept="image/*">
        <label>Фото не менять <input type="checkbox" name="photoCheck" value="<?= $data['img']?>"></label><br>
        <input class="good_form__item" type="submit" value="Сохранить">
    </form>
<script src="public/js/changeGood.js"></script>


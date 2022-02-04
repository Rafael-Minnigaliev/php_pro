<?php
include "Goods.php";

include "DigitalGoods.php";
include "PhysicalGoods.php";
include "WeightGoods.php";


$goods = [
    $pg = new PhysicalGoods("Колье", 100000, 2, 40),
    $dg = new DigitalGoods("Песня", $pg->getPrice()/2, 3, 50),
    $wg = new WeightGoods("Рис", 150, 0.8, 30)
];
//Как я понял стоимость цифрового товара не константа а просто постоянно дешевле штучного товара в два раза,
//а если не правильно то просто в цифровом товаре указываем цену в константе в два раза меньше цены штушчного товара
//и соответсвенно в создании объекта не передаем параметр $price и убираем его из конструктора для цифрового товара


foreach ($goods as $good){
    echo "Финальная стоимость товара \"$good\": {$good->calcFinalPrice()} у.е.<br>";
    echo "Валовый доход: {$good->marginCalc()} у.е.<hr>";
}

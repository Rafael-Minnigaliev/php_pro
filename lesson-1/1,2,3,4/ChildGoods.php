<?php
require "Goods.php";

class ChildGoods extends Goods{
    private $age;

    function __construct($title, $price, $color, $size, $age){
        parent::__construct($title, $price, $color, $size);
        $this->age = $age;
    }

    function showInfo(){
        echo "{$this->title} для детей в возрасте {$this->age} лет, размер {$this->size}, цвет {$this->color}, стоит {$this->price} <br>";
    }
}

$childGoods = [
    new ChildGoods("Комбинезон", "2500", "синий", "L", "от 3 до 5"),
    new ChildGoods("Футболка", "600", "белый", "L", "от 7 до 9"),
    new ChildGoods("Куртка", "2000", "красный", "XS", "от 5 до 7"),
];

foreach ($childGoods as $childGood){
    if(date("d") == 21){    //Скидка 20% 15ого числа каждого месяца
        Stock::discount($childGood, 0.8);
    }
    $childGood->showInfo();
}
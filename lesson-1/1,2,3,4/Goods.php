<?php
require "Stock.php";

class Goods{
    protected $title;
    public $price;
    protected $color;
    protected $size;

    function __construct($title, $price, $color, $size){
        $this->title = $title;
        $this->price = $price;
        $this->color = $color;
        $this->size = $size;
    }

    function showInfo(){
        echo "{$this->title}, размер {$this->size}, цвет {$this->color}, стоит {$this->price} <br>";
    }
}

$goods = [
    new Goods("Футболка", "1000", "белый", "L"),
    new Goods("Рубашка", "1500", "голубой", "M"),
    new Goods("Футболка", "1200", "Черный", "L"),
    new Goods("Кепка", "1800", "Красный", "S"),
    new Goods("Куртка", "5000", "Хаки", "XS"),
];

foreach ($goods as $good){
    if(date("d") == 15){    //Скидка 20% 15ого числа каждого месяца
        Stock::discount($good, 0.8);
    }
    $good->showInfo();
}


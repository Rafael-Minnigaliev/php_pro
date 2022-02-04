<?php

class WeightGoods extends Goods{
    private $weight;
    private $price;

    function __construct($goodName, $price, $weight, $priceMarkup){
        parent::__construct($goodName, $priceMarkup);
        $this->weight = $weight;
        $this->price =$price;
    }

    function calcFinalPrice(){
        return $this->weight * $this->price;
    }

    function marginCalc(){
        return $this->calcFinalPrice() * $this->getPriceMarkup() / 100;
    }

    public function getWeight(){
        return $this->weight;
    }

    public function getPrice(){
        return $this->price;
    }

    function __toString(){
        return $this->getGoodName();
    }
}

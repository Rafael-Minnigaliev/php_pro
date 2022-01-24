<?php

class DigitalGoods extends Goods{
    private $count;
    private $price;
    function __construct($goodName, $price, $count, $priceMarkup){
        parent::__construct($goodName, $priceMarkup);
        $this->count = $count;
        $this->price =$price;
    }

    function calcFinalPrice(){
        return $this->count * $this->price;
    }

    function marginCalc(){
       return $this->calcFinalPrice() * $this->getPriceMarkup() / 100;
    }

    public function getCount(){
        return $this->count;
    }

    public function getPrice()
    {
        return $this->price;
    }

    function __toString(){
        return $this->getGoodName();
    }
}



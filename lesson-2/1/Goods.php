<?php
abstract class Goods{
    private $goodName;
    private $priceMarkup;

    protected function __construct($goodName, $priceMarkup){
        $this->goodName = $goodName;
        $this->priceMarkup = $priceMarkup;
    }

    abstract function calcFinalPrice();
    abstract function marginCalc();

    public function getPriceMarkup(){
        return $this->priceMarkup;
    }
    public function getGoodName(){
        return $this->goodName;
    }
}
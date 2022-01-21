<?php

class Stock{
    static function discount($item, $i){
        $item->price *= $i;
    }
}
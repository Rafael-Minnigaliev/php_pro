<?php
class MOrder{
    public static function getOrderInfo($id){
        return DB::Select("SELECT name, count, price, price * count AS total_price FROM cart JOIN goods ON cart.goods_id = goods.id WHERE order_id = :id", ['id' => $id]);
    }

    public static function getOrderPrice($id){
        return DB::getRow("SELECT sum(price * cart.count) AS sum FROM cart JOIN goods ON cart.goods_id = goods.id WHERE order_id = :id", ['id' => $id]);
    }
}
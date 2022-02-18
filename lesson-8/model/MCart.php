<?php
class MCart{
    public static function getCount(){
        if($_SESSION['user_id']){
            return DB::getRow("SELECT sum(count) sum FROM cart WHERE users_id = :id AND status = 0", ['id' => $_SESSION['user_id']]);
        }else{
            return DB::getRow("SELECT sum(count) sum FROM cart WHERE session_id = :id AND users_id = 0 AND status = 0", ['id' => session_id()]);
        }
    }

    public static function getCartList(){
        if($_SESSION['user_id']){
            return DB::Select("SELECT cart.id, goods_id, goods.name, price, count, img, gender_category.name gen_name, goods_category.name good_cat_name FROM cart JOIN goods ON cart.goods_id = goods.id JOIN category ON category_id = category.id JOIN gender_category ON gender_category_id = gender_category.id 
                JOIN goods_category ON goods_category_id = goods_category.id WHERE users_id = :id AND status = 0", ['id' => $_SESSION['user_id']]);
        }else{
            return DB::Select("SELECT cart.id, goods_id, goods.name, price, count, img, gender_category.name gen_name, goods_category.name good_cat_name FROM cart JOIN goods ON cart.goods_id = goods.id JOIN category ON category_id = category.id JOIN gender_category ON gender_category_id = gender_category.id 
                JOIN goods_category ON goods_category_id = goods_category.id WHERE session_id = :id AND users_id = 0 AND status = 0", ['id' => session_id()]);
        }
    }

    public static function getTotalPrice(){
        if($_SESSION['user_id']){
            return DB::getRow("SELECT sum(price * cart.count) sum FROM cart JOIN goods ON cart.goods_id = goods.id WHERE users_id = :id AND status = 0", ['id' => $_SESSION['user_id']]);
        }else{
            return DB::getRow("SELECT sum(price * cart.count) sum FROM cart JOIN goods ON cart.goods_id = goods.id WHERE session_id = :id AND users_id = 0 AND status = 0", ['id' => session_id()]);
        }
    }



}
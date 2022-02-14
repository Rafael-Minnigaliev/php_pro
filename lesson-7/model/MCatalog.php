<?php
class MCatalog{
    const SQL = "SELECT goods.id, goods.name, img, price, info, gender_category.name gen_name, goods_category.name good_cat_name 
                FROM goods JOIN category ON category_id = category.id JOIN gender_category ON gender_category_id = gender_category.id 
                JOIN goods_category ON goods_category_id = goods_category.id";
    const SQL_COUNT = "SELECT count(goods.id) count FROM goods JOIN category ON category_id = category.id JOIN gender_category ON gender_category_id = gender_category.id 
                JOIN goods_category ON goods_category_id = goods_category.id";

    public static function getCount($gCat = false, $gen = false){
        if($gCat && $gen){
            $catId = DB::getRow("SELECT id FROM category WHERE gender_category_id = :gen AND goods_category_id = :gCat", ['gen' => $gen, 'gCat' => $gCat]);
            return DB::getRow(self::SQL_COUNT." WHERE category_id = :id", ['id' => $catId['id']]);
        }elseif($gCat && !$gen){
            $catId = DB::Select("SELECT id FROM category WHERE goods_category_id = :gCat", ['gCat' => $gCat]);
            return DB::getRow(self::SQL_COUNT." WHERE category_id IN (:id1, :id2, :id3)",
                ['id1' => $catId[0]['id'], 'id2' => $catId[1]['id'], 'id3' => $catId[2]['id']]);
        }elseif(!$gCat && $gen){
            $catId = DB::Select("SELECT id FROM category WHERE gender_category_id = :gen", ['gen' => $gen]);
            return DB::getRow(self::SQL_COUNT." WHERE category_id IN (:id1, :id2, :id3, :id4)",
                ['id1' => $catId[0]['id'], 'id2' => $catId[1]['id'], 'id3' => $catId[2]['id'], 'id4' => $catId[3]['id']]);
        }else{
            return DB::getRow(self::SQL_COUNT);
        }
    }

    public static function getGoods($gCat = false, $gen = false, $start = 0){
        if($gCat && $gen){
            $catId = DB::getRow("SELECT id FROM category WHERE gender_category_id = :gen AND goods_category_id = :gCat", ['gen' => $gen, 'gCat' => $gCat]);
            return DB::Select(self::SQL." WHERE category_id = :id LIMIT $start, 20", ['id' => $catId['id']]);
        }elseif($gCat && !$gen){
            $catId = DB::Select("SELECT id FROM category WHERE goods_category_id = :gCat", ['gCat' => $gCat]);
            return DB::Select(self::SQL." WHERE category_id IN (:id1, :id2, :id3) LIMIT $start, 20",
                    ['id1' => $catId[0]['id'], 'id2' => $catId[1]['id'], 'id3' => $catId[2]['id']]);
        }elseif(!$gCat && $gen){
            $catId = DB::Select("SELECT id FROM category WHERE gender_category_id = :gen", ['gen' => $gen]);
            return DB::Select(self::SQL." WHERE category_id IN (:id1, :id2, :id3, :id4) LIMIT $start, 20",
                ['id1' => $catId[0]['id'], 'id2' => $catId[1]['id'], 'id3' => $catId[2]['id'], 'id4' => $catId[3]['id']]);
        }else{
            return DB::Select(self::SQL." ORDER BY goods.id LIMIT $start, 20");
        }
    }

    public static function getGoodInfo($id){
        return DB::getRow("SELECT goods.id, goods.name, img, price, info, full_info, gender_category.name gen_name, goods_category.name good_cat_name 
                            FROM goods JOIN category ON category_id = category.id JOIN gender_category ON gender_category_id = gender_category.id 
                            JOIN goods_category ON goods_category_id = goods_category.id WHERE goods.id = :id", ['id' => $id]);
    }
}
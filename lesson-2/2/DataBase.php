<?php
include "Trait.php";

class DataBase{
    private static $obj;
    private static $connect;

    use construct;
    use createObject;

    use select;
    use delete;
    use update;
    use insert;
}



class Goods{
    private $db;

    function __construct(){
        $this->db = DataBase::createObject();
    }

    function showGoods(){
        $this->db->select();
        $this->db->delete();
        $this->db->update();
        $this->db->insert();
    }
}

$g = new Goods();
$g->showGoods();


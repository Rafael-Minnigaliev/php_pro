<?php
trait construct{
    private function __construct(){
        self::$connect = "msc";
    }
}

trait createObject{
    public static function createObject(){
        if(self::$obj == null){
            self::$obj = new DataBase();
        }
        return self::$obj;
    }
}

trait select{
    function select(){
        echo "select<br>";
    }
}

trait delete{
    function delete(){
        echo "delete<br>";
    }
}

trait update{
    function update(){
        echo "update<br>";
    }
}

trait insert{
    function insert(){
        echo "insert<br>";
    }
}








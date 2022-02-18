<?php
class CPage extends CBase {
    protected function actionIndex(){
        $this->title = "Интернет магазин";
        $img = "public/images/shop.jpg";
        $this->content = $this->template("view/v_index.php", array('img' => $img));
    }
}
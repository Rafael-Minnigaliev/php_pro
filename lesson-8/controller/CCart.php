<?php
class CCart extends CBase{
    protected function actionIndex(){
        if (!$_SESSION['role']){
            $this->title = "Корзина";
            $data = MCart::getCartList();
            $totalPrice = MCart::getTotalPrice();
            $this->content = $this->template("v_cart.twig", array('data' => $data, 'totalPrice' => $totalPrice));
        }else{
            header("Location: index.php");
        }
    }
}
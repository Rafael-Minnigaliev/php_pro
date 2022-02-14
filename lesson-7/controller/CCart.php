<?php
class CCart extends CBase{
    protected function actionIndex(){
        $this->title = "Корзина";
        $data = MCart::getCartList();
        $totalPrice = MCart::getTotalPrice();
        $this->content = $this->template("cart/v_cart.twig", array('data' => $data, 'totalPrice' => $totalPrice));
    }
}
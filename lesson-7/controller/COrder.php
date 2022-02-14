<?php
class COrder extends CBase {
    protected function actionIndex(){

    }

    protected function actionOrderList(){
        if ($_SESSION['user_id'] && !$_SESSION['role']){
            $this->title = "Мои заказы";
            $data = MOrder::getOrderList($_SESSION['user_id']);
            $this->content = $this->template("order/v_order_list.twig", ['data' => $data, 'userId' => $_SESSION['user_id']]);
        }else{
            header("Location: index.php");
        }
    }

    protected function actionOrderInfo(){
        if ($_SESSION['user_id'] && !$_SESSION['role']){
            $this->title = "Информация о заказе №{$_GET['id']}";
            $data =MOrder::getOrderInfo($_GET['id']);
            $price = MOrder::getOrderPrice($_GET['id']);
            $this->content = $this->template("order/v_order_info.twig", ['data' => $data, 'price' => $price]);
        }
        else{
            header("Location: index.php");
        }
    }
}
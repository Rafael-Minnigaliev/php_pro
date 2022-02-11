<?php
class COrder extends CBase {
    protected function actionOrderList(){
        if ($_SESSION['user_id'] && !$_SESSION['role']){
            $this->title = "Мои заказы";
            $this->content = $this->template("order/v_order_list.html", ['userId' => $_SESSION['user_id']]);
        }else{
            header("Location: index.php");
        }
    }

    protected function actionOrderInfo(){
        if ($_SESSION['user_id'] && !$_SESSION['role']){
            $this->title = "Информация о заказе №{$_GET['id']}";
            $data =MOrder::getOrderInfo($_GET['id']);
            $price = MOrder::getOrderPrice($_GET['id']);
            $this->content = $this->template("order/v_order_info.html", ['data' => $data, 'price' => $price]);
        }
        else{
            header("Location: index.php");
        }
    }
}
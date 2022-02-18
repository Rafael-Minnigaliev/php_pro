<?php
class COrder extends CBase {
    protected function actionIndex(){
        if (!$_SESSION['role']){
            $this->title = "Оформление заказа";
            if($_SESSION['user_id']){
                $userInfo = MOrder::getOrderUserInfo($_SESSION['user_id']);
            }
            $deliveryDate = date('d.m.Y', strtotime("+2 day"));
            $orderInfo = MOrder::getOrderRegInfo();
            $totalPrice = MOrder::getOrderTotalPrice();
            $this->content = $this->template("order/v_order_reg.twig", ['userId' => $_SESSION['user_id'], 'orderInfo' => $orderInfo, 'userInfo' => $userInfo, 'totalPrice' => $totalPrice, 'deliveryDate' => $deliveryDate]);
        }else{
            header("Location: index.php");
        }
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

    protected function actionOrderRegistration(){
        if(!$_SESSION['role']){
            $this->title = "";
            $orderId = MOrder::orderRegistration($_POST['payMethod']);
            $this->content = $this->template("order/v_order_reg.twig", ['orderId' => $orderId['id']]);
        }else{
            header("Location: index.php");
        }
    }

    protected function actionAdminOrderList(){
        if($_SESSION['user_id'] && $_SESSION['role']){
            $this->title = "Заказы";
            $data = MOrder::getAdminOrderList();
            $this->content = $this->template("order/v_admin_order_list.twig", ['data' => $data]);
        }else{
            header("Location: index.php");
        }
    }

    protected function actionAdminOrderInfo(){
        if($_SESSION['user_id'] && $_SESSION['role']){
            $id = (int)$_GET['id'];
            $this->title = "Заказ №$id";
            $data = MOrder::getAdminOrderInfo($id);
            $this->content = $this->template("order/v_admin_order_info.twig", ['data' => $data, 'orderId' => $id ]);
        }else{
            header("Location: index.php");
        }
    }

    protected function actionChangeOrderStatus(){
        if($_SESSION['user_id'] && $_SESSION['role']){
            $status = (int)$_POST['orderStatus'];
            $id = (int)$_GET['id'];
            MOrder::changeOrderStatus($status, $id);
        }else{
            header("Location: index.php");
        }
    }

    protected function actionDeleteGoodFromOrder(){
        if($_SESSION['user_id'] && $_SESSION['role']){
            $goodId = (int)$_GET['goodId'];
            $user = is_numeric($_GET['user']) ? (int)$_GET['user'] : (string)$_GET['user'];
            $orderId = (int)$_GET['orderId'];
            MOrder::DeleteGoodFromOrder($goodId, $user, $orderId);
        }else{
            header("Location: index.php");
        }
    }

    protected function actionChangeCountFromOrder(){
        if($_SESSION['user_id'] && $_SESSION['role']){
            $count = (int)$_GET['count'];
            $goodId = (int)$_GET['goodId'];
            $user = is_numeric($_GET['user']) ? (int)$_GET['user'] : (string)$_GET['user'];
            $orderId = (int)$_GET['orderId'];
            MOrder::ChangeCountFromOrder($count, $goodId, $user, $orderId);
        }else{
            header("Location: index.php");
        }
    }
}
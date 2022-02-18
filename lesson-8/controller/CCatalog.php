<?php
class CCatalog extends CBase {
    protected function actionIndex(){
        $this->title = "Каталог";
        if(!$_SESSION['role']){
            if($this->isMethod('POST')){
                $gCat = (int)$_POST['gCategory'] != "none" ? (int)$_POST['gCategory'] : false;
                $gen = (int)$_POST['gender'] != "none" ? (int)$_POST['gender'] : false;
                $data = MCatalog::getGoods($gCat, $gen);
                $count = MCatalog::getCount($gCat, $gen);
                $maxPage = round($count['count'] / 20);
                $this->content = $this->template("catalog/v_catalog.twig", array('data' => $data, 'gCat' => $gCat, 'gen' => $gen, 'maxPage' => $maxPage, 'sid' => session_id(), 'uid' => $_SESSION['user_id']));
            }else{
                $data = MCatalog::getGoods();
                $count = MCatalog::getCount();
                $maxPage = round($count['count'] / 20);
                $this->content = $this->template("catalog/v_catalog.twig", array('data' => $data, 'maxPage' => $maxPage, 'sid' => session_id(), 'uid' => $_SESSION['user_id'], 'admin' => $_SESSION['role']));
            }
        }else{
            if($this->isMethod('POST')){
                $gCat = (int)$_POST['gCategory'] != "none" ? (int)$_POST['gCategory'] : false;
                $gen = (int)$_POST['gender'] != "none" ? (int)$_POST['gender'] : false;
                $data = MCatalog::getGoods($gCat, $gen);
                $count = MCatalog::getCount($gCat, $gen);
                $maxPage = round($count['count'] / 20);
                $this->content = $this->template("catalog/v_admin_catalog.twig", array('data' => $data, 'gCat' => $gCat, 'gen' => $gen, 'maxPage' => $maxPage, 'sid' => session_id(), 'uid' => $_SESSION['user_id']));
            }else{
                $data = MCatalog::getGoods();
                $count = MCatalog::getCount();
                $maxPage = round($count['count'] / 20);
                $this->content = $this->template("catalog/v_admin_catalog.twig", array('data' => $data, 'maxPage' => $maxPage, 'sid' => session_id(), 'uid' => $_SESSION['user_id'], 'admin' => $_SESSION['role']));
            }
        }
    }


    protected function actionGetGoodInfo(){
        $id = (int)$_GET['id'];
        $data = MCatalog::getGoodInfo($id);
        $path = $_SERVER['HTTP_REFERER'];
        $this->title = $data['name'];
        $this->content = $this->template("catalog/v_product.twig", array('data' => $data, 'sid' => session_id(), 'uid' => $_SESSION['user_id'], 'path' => $path, 'admin' => $_SESSION['role']));
    }
}
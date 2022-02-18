<?php
require_once "model/MLogin.php";
require_once "model/MReg.php";
require_once "model/MProfile.php";

class CUser extends CBase{
    protected function actionProfile(){
        if ($_SESSION['user_id']) {
            $this->title = "Личный кабинет";
            $mProfile = new MProfile();
            $name = $mProfile->getName($_SESSION['user_id']);
            $this->content = $this->template("view/v_profile.php", array('name' => $name));
        } else {
            header("Location: index.php");
        }
    }

    protected function actionLogOut(){
        if ($_SESSION['user_id']) {
            $mProfile = new MProfile();
            $mProfile->logOut();
        } else {
            header("Location: index.php");
        }
    }

    protected function actionLogin(){
        if (!$_SESSION['user_id']){
            if($this->isMethod('POST')){
                $mLogin = new MLogin();
                $mLogin->login();
            }else{
                $this->title = "Авторизация";
                $this->content = $this->template("view/v_login.php", array());
            }
        } else {
            header("Location: index.php");
        }
    }

    protected function actionReg(){
        if (!$_SESSION['user_id']){
            if($this->isMethod('POST')){
                $mLogin = new MReg();
                $mLogin->reg();
            }else{
                $this->title = "Регистрация";
                $this->content = $this->template("view/v_reg.php", array());
            }
        } else {
            header("Location: index.php");
        }
    }
}

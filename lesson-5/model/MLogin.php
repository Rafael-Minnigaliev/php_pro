<?php
class MLogin{
    public function login(){
        $login = $_POST['login'] ? strip_tags($_POST['login']) : "";
        $pass = $_POST['pass'] ? strip_tags($_POST['pass']) : "";
        $password = strrev(md5($login)).md5($pass).strrev(md5($login));
        require_once "connect.php";
        $sth = $db->prepare("SELECT id, role FROM users WHERE login =? and pass =?");
        $sth->execute([$login, $password]);
        if($sth->rowCount()){
            session_start();
            $data = $sth->fetch(PDO::FETCH_ASSOC);
            if($data['role'] == 1 ){
                $_SESSION['user_id'] = $data['id'];
                $_SESSION['role'] = $data['role'];
                header("Location: index.php?c=user&act=profile");
            }else{
                $_SESSION['user_id'] = $data['id'];
                header("Location: index.php?c=user&act=profile");
            }
        }else{
            header("Location: index.php?c=user&act=Login&status=error");
        }
    }
}



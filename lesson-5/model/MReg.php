<?php
class MReg{
    public function reg(){
        $name = $_POST['name'] ? strip_tags($_POST['name']) : "";
        $login = $_POST['login'] ? strip_tags($_POST['login']) : "";
        $pass = $_POST['pass'] ? strip_tags($_POST['pass']) : "";
        $tel = (int)$_POST['tel'];
        $address = $_POST['address'] ? strip_tags($_POST['address']) : "";
        require_once "connect.php";
        $sth1 = $db->prepare("SELECT login FROM users WHERE login = ?");
        $sth1->execute([$login]);
        if($sth1->rowCount()){
            header("Location: index.php?c=user&act=Reg&status=loginExists");
        }else{
            $sth2 = $db->prepare("INSERT INTO users(name, login, pass, telephone, address) VALUES(:name, :login, CONCAT(REVERSE(md5(:login)),md5(:pass),REVERSE(md5(:login))), :tel, :address)");
            $sth2->execute([
                'name' => $name,
                'login' => $login,
                'pass' => $pass,
                'tel' => $tel,
                'address' => $address
            ]);
            if($sth2->rowCount() > 0){
                header("Location: index.php?c=user&act=Login");
            }
        }
    }
}
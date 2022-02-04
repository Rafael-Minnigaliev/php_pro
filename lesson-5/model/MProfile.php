<?php
class MProfile{
    public function getName($id){
        require_once "connect.php";
        $sth = $db->prepare("SELECT name FROM users WHERE id = :id");
        $sth->bindParam(':id', $id, PDO::PARAM_INT);
        $sth->execute();
        return $sth->fetch(PDO::FETCH_ASSOC)['name'];
    }

    public function logOut(){
        session_destroy();
        header("Location: index.php?c=index");
    }
}
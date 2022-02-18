<?php
class CBase extends Controller {
    protected $title;
    protected $content;

    public function render(){
        $data = array('title' => $this->title, 'content' => $this->content, 'userSession' => $_SESSION['user_id'], 'admin' => $_SESSION['role']);
        echo $this->template("v_main.html", $data);
    }
}
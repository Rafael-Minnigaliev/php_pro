<?php
class CBase extends Controller {
    protected $title;
    protected $content;

    public function render(){
        $data = array('title' => $this->title, 'content' => $this->content);
        echo $this->template('view/v_main.php', $data);
    }
}
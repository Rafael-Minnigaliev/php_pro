<?php
abstract class Controller{
    abstract function render();

    public function Request($action){
       $this->$action();
       $this->render();
    }

    public function ajaxRequest($action){
        $this->$action();
    }

    protected function template($fileName, $data = array()){
        $loader = new Twig_Loader_Filesystem("view");
        $twig = new Twig_Environment($loader);
        $template = $twig->loadTemplate($fileName);
        return $template->render($data);
    }

    protected function isMethod($method){
        if($_SERVER['REQUEST_METHOD'] == $method){
            return true;
        }else{
            return false;
        }
    }

    public function __call($name, $pararms){
        die("Метода $name не существует!");
    }
}
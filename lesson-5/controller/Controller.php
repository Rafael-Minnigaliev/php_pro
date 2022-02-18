<?php
abstract class Controller{
    abstract function render();

    public function Request($action){
        $this->$action();
        $this->render();
    }

    protected function template($fileName, $data = array()){
        foreach ($data as $k => $v){
            $$k = $v;
        }

        ob_start();
        include $fileName;
        return ob_get_clean();
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
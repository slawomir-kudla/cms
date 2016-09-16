<?php

class controller {
    
    public $method = "";
    
    public function execiutMethod() {
        if ($this->method == '') {
            $this->index();
            return;
        }
        if (method_exists($this, $this->method)) {
            call_user_func(array($this, $this->method));
        } else {
            echo "nie ma takiej metody";
        }
    }
    
    public function index(){
        echo "INDEX";
    }
    
    public function lista(){
        echo "lista";
    }
    
}
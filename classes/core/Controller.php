<?php

include_once "App.php";

class Controller {
    
    public function render($view, $params = []) {
        return App::$APP->router->renderView($view, $params);
    }

}
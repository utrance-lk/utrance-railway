<?php

include_once "App.php";
// include_once "../../utrance-railway/classes/middlewares/AuthMiddleware.php";

class Controller {
    
    // public $middlewares = [];

    public function __construct()
    {
        // $this->middlewares['auth'] = new AuthMiddleware();
    }

    
    public function render($view, $params = []) {
        return App::$APP->router->renderView($view, $params);
    }

    // public function isLoggedIn() {
    //     $this->middlewares[] = $middleware;
    // }

}
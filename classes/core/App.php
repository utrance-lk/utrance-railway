<?php

include_once "Router.php";
include_once "Request.php";
include_once "Response.php";
include_once "Database.php";

class App {
    
    public static $ROOT_DIR;
    public static $APP;
    public $router;
    public $request;
    public $response;
    public $db;

    public function __construct($rootPath, $config) {
        self::$ROOT_DIR = $rootPath;
        self::$APP = $this;
        $this->request = new Request();
        $this->response = new Response();
        $this->router = new Router($this->request, $this->response);

        $this->db = new Database($config['db']);
    }

    public function run() {
        echo $this->router->resolve();
    }

}

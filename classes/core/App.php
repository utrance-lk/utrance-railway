<?php

include_once "Router.php";
include_once "Request.php";
include_once "Response.php";
include_once "Session.php";
include_once "Database.php";

class App {
    
    public static $ROOT_DIR;
    public static $APP;
    public $router;
    public $request;
    public $response;
    public $session;
    public $db;
    public $user;
    public $userClass;

    public function __construct($rootPath, $config) {
        $this->userClass = $config['userClass'];
        self::$ROOT_DIR = $rootPath;
        self::$APP = $this;
        $this->request = new Request();
        $this->response = new Response();
        $this->session = new Session();
        $this->router = new Router($this->request, $this->response);

        $this->db = new Database($config['db']);

        $activeUserId = $this->session->get('user');
        if($activeUserId) {
            $this->user = $this->userClass::getUser($activeUserId);
        }

    }

    public function activeUser() {
        return [
            "first_name" => $this->user[0]["first_name"],
            "last_name" => $this->user[0]["last_name"],
            "id" => $this->user[0]["id"],
            "email_id" => $this->user[0]["email_id"],
            "street_line1" => $this->user[0]["street_line1"],
            "street_line2" => $this->user[0]["street_line2"],
            "city" => $this->user[0]["city"],
            "contact_num" => $this->user[0]["contact_num"],
            "role" => $this->user[0]["user_role"],
        ];
    }

    public function run() {
        echo $this->router->resolve();
    }

}

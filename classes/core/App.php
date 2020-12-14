<?php

include_once "Router.php";
include_once "Request.php";
include_once "Response.php";
include_once "Session.php";
include_once "Database.php";

include_once "../utils/Email.php";

class App {
    
    public static $ROOT_DIR;
    public static $APP;
    public $router;
    public $request;
    public $response;
    public $session;
    public $db;
    public $email;
    public $user;
    public $userClass;

    public function __construct($rootPath, $config) {

        date_default_timezone_set("Asia/Colombo");

        $this->userClass = $config['userClass'];
        self::$ROOT_DIR = $rootPath;
        self::$APP = $this;
        $this->request = new Request();
        $this->response = new Response();
        $this->session = new Session();
        $this->router = new Router($this->request, $this->response);

        $this->db = new Database($config['db']);
        $this->email = new Email($config['email']);

        $activeUserId = $this->session->get('user');
      
        if($activeUserId) {
            $this->user = $this->userClass::getUser($activeUserId);
        }
        

        if(!empty($this->user)) {
            $this->isActiveAccount();
        }

    }

    public function activeUser() {
        if($this->user) {
            return [
                "id" => $this->user[0]["id"],
                "first_name" => $this->user[0]["first_name"],
                "last_name" => $this->user[0]["last_name"],
                "email_id" => $this->user[0]["email_id"],
                "street_line1" => $this->user[0]["street_line1"],
                "street_line2" => $this->user[0]["street_line2"],
                "city" => $this->user[0]["city"],
                "contact_num" => $this->user[0]["contact_num"],
                "role" => $this->user[0]["user_role"],
                "user_image" => $this->user[0]["user_image"],
            ];
        }

        return [
            "id" => null,
            "first_name" => null,
            "last_name" => null,
            "email_id" => null,
            "street_line1" => null,
            "street_line2" => null,
            "city" => null,
            "contact_num" => null,
            "role" => null,
            "user_image" => null
        ];
    }
    
    

    private function isActiveAccount() {
        if(!$this->user[0]['user_active_status']) {
            echo 'your account has been deactivated or banned';
            $this->response->redirect('/utrance-railway/logout');
        }
    }

    public function run() {
        echo $this->router->resolve();
    }

}

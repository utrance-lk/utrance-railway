<?php

include_once "../classes/core/Controller.php";

class SiteController extends Controller{

    public function home() {
        $params = [
            'name' => "shark"
        ];
        // return App::$APP->router->renderView('home', $params);
        $this->render('home', $params);
    }

    public function contact() {
        App::$APP->router->renderView('contact');
    }

    public function handleContact() {
        return 'Handling submitted data';
    }

}
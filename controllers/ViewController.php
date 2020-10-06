<?php

include_once "../classes/core/Controller.php";
include_once "../models/ViewModel.php";

class ViewController extends Controller{

    public function home() {
        return $this->render('home');
    }

    public function search() {
        $viewModel = new ViewModel();
    }

    public function contact() {
        App::$APP->router->renderView('contact');
    }

    public function handleContact($request) {
        $body = $request->getBody();
        var_dump($body);
        return 'Handling submitted data';
    }

}
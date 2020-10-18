<?php

include_once "../classes/core/Controller.php";
include_once "../models/ViewModel.php";

class ViewController extends Controller{

    public function home() {
        return $this->render('home');
    }

    public function search($request) {
           
        $viewModel = new ViewModel();
        if($request->isPost()) {
            $viewModel->loadData($request->getBody());

            // var_dump($request->getBody());

            $viewModel->getTours();
            
            // if($viewModel->getTours()) {
            //     // return 'Success';
            //     echo 'vade hari';
            // }

            // else {
            //     echo 'upset';
            //     return 'Failed';
            // }

        }

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
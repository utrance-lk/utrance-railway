<?php

include_once "../classes/core/Controller.php";
include_once "../models/ViewModel.php";

class ViewController extends Controller
{

    public function home($request)
    {

        if ($request->isPost()) {
            ///
        }

        return $this->render('home');
    }

    public function search($request)
    {

        if ($request->isPost()) {

            $searchTourModel = new ViewModel();
            $searchTourModel->loadData($request->getBody());

            $pathArrays = $searchTourModel->getTours();

            return $this->render('searchResults', $pathArrays);

        }

        return $this->render('searchResults');

    }

    public function bookSeat($request) {
        if($request->isPost()) {
            // form submission
            return '';
        }

        return $this->render('booking');

    }

    public function viewTrain($request) {
        if($request->isGet()) {

            $viewTrainStopsModel = new ViewModel();
            $viewTrainStopsModel->loadData($request->getBody());


            return $this->render('viewTrain');
        }

    }
    
}

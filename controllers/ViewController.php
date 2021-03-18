<?php

include_once "../classes/core/Controller.php";
include_once "../models/ViewModel.php";

class ViewController extends Controller
{

    public function home($request)
    {

        if ($request->isPost()) {
            // $searchTourModel = new ViewModel();
            // $searchTourModel->loadData($request->getBody());

            // $pathArrays = $searchTourModel->getTours();

            // return $this->render('searchResults', $pathArrays);
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
        /*if($request->isGet()) {
            $viewTrainDetails = new ViewModel();
            $viewTrainDetails->loadData($request->getQueryParams());
            $updateUserArray = $adminViewUser->getUserDetails();

            return $this->render('viewTrain');
        }*/
        
        if($request -> isGet()){
            $viewTrainDetailsModel = new ViewModel();
            $tempBody = $request->getBody();
            $tempBody['train_id'] = $request->getQueryParams()['train_id'];
            //$tempBody['start_station'] = $request->getQueryParams()['start_station'];
           // $tempBody['destination_station'] = $request->getQueryParams()['destination_station'];
            
            $viewTrainDetailsModel->loadData($tempBody);
            $trainScheduleArray=$viewTrainDetailsModel->getTrainSchedules();
            
          
           // var_dump($trainScheduleArray);
            return $this->render('viewTrain',$trainScheduleArray);
        }
       

    }


    
    
}

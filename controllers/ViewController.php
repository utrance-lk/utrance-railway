<?php

include_once "../classes/core/Controller.php";
include_once "../models/ViewModel.php";
include_once "../models/TicketModel.php";

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

            $train1PriceModel = new TicketModel();
            // var_dump($request->getBody());
            
            if($pathArrays['directPaths']) {
                $train1PriceModel->loadData(['start' => $pathArrays['directPaths'][0]['fssn'], 'destination' => $pathArrays['directPaths'][0]['tsen']]);
                $pathArrays['directPaths']['train1Price'] = $train1PriceModel->getTicketPrice();
            }
            if ($pathArrays['intersections']) {
                $train2PriceModel = new TicketModel();
                $train1PriceModel->loadData(['start' => $pathArrays['intersections'][0]['fssn'], 'destination' => $pathArrays['intersections'][0]['isn']]);
                $train2PriceModel->loadData(['start' => $pathArrays['intersections'][0]['isn'], 'destination' => $pathArrays['intersections'][0]['tsen']]);
                
                $pathArrays['intersections'][0]['train1Price'] = $train1PriceModel->getTicketPrice()['tickets'];
                $pathArrays['intersections'][0]['train2Price'] = $train2PriceModel->getTicketPrice()['tickets'];
            }

            // var_dump($pathArrays['intersections']);


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
          
            
            $viewTrainDetailsModel->loadData($tempBody);
            $trainScheduleArray=$viewTrainDetailsModel->getTrainSchedules();
            
            return $this->render('viewTrain',$trainScheduleArray);
        }
       

    }


    
    
}

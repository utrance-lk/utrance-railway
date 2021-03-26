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

   

    public function search($request, $response)
    {

        if ($request->isPost()) {

            $searchTourModel = new ViewModel();
            $searchTourModel->loadData($request->getBody());

            $pathArrays = $searchTourModel->getTours();

            if(!$pathArrays) {
                $response->setStatusCode(404);
                return $this->render(['error', 'station not found']);
            }

            // adding ticket prices for the request
            $train1PriceModel = new TicketModel();
            
            if($pathArrays['directPaths']) {
                $train1PriceModel->loadData(['start' => $pathArrays['directPaths'][0]['fssn'], 'destination' => $pathArrays['directPaths'][0]['tsen']]);
                $index = 0;
                foreach($pathArrays['directPaths'] as $key => $value) {
                    $pathArrays['directPaths'][$index]['train1Price'] = $train1PriceModel->getTicketPrice()['tickets'];
                    $index++;
                }
            }
            if ($pathArrays['intersections']) {
                $train2PriceModel = new TicketModel();
                $train1PriceModel->loadData(['start' => $pathArrays['intersections'][0]['fssn'], 'destination' => $pathArrays['intersections'][0]['isn']]);
                $train2PriceModel->loadData(['start' => $pathArrays['intersections'][0]['isn'], 'destination' => $pathArrays['intersections'][0]['tsen']]);
                
                $pathArrays['intersections'][0]['train1Price'] = $train1PriceModel->getTicketPrice()['tickets'];
                $pathArrays['intersections'][0]['train2Price'] = $train2PriceModel->getTicketPrice()['tickets'];
            }

            // adding available seats for the request

            return $this->render('searchResults', $pathArrays);

        }

        return $this->render('searchResults');

    }



    
    public function viewAllTrainDetails($request){
        $viewAllTrainDetailsModel = new ViewModel();
        if($request->isGet()){
           
            $viewAllTrainDetailsModel->loadData($request->getBody());
            $getAllTrainResults = $viewAllTrainDetailsModel->getAllTrainResults();
           return $this->render('viewAllTrainDetails', $getAllTrainResults);
        }
        
        if ($request->isPost()) {
            $searchTrainDetailsModel = new  ViewModel();

            $searchTrainDetailsModel->loadData($request->getBody());

            $searchResultArray = $searchTrainDetailsModel->searchTrainDetails();

            return $this->render('viewAllTrainDetails', $searchResultArray);

        }

    }

    public function newSearchResults($request){

        if ($request->isPost()) {
            $saveDetailsModel = new ViewModel();
            $tempBody = $request->getBody();
            //$tempBody['index1'] = $_POST['index1'];
            $tempBody['index2'] = $_POST['index2'];
            $saveDetailsModel->loadData($tempBody);

            $trainArrays = $saveDetailsModel->getAllTrainsDetails();
             
           
            echo json_encode($trainArrays);
        }

    }


    public function bookSeat($request) {
        if($request->isPost()) {
            // form submission
            return '';
        }

        return $this->render('booking');

    }


   

    public function viewTrain($request) {
       
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

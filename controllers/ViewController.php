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

        $getStationsModel = new ViewModel();
        $stationsArray['stations'] = $getStationsModel->getStations(); 
        
        App::$APP->session->set('stationArray', $stationsArray);

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
                $pathArrays['error'] = true;
                return $this->render('searchResults', $pathArrays);
            }

            // adding ticket prices for the request
            $train1PriceModel = new TicketModel();
            
            if($pathArrays['directPaths']) {
                $index = 0;
                foreach($pathArrays['directPaths'] as $key => $value) {
                    $train1PriceModel->loadData(['start' => $pathArrays['directPaths'][$index]['fssn'], 'destination' => $pathArrays['directPaths'][$index]['tsen']]);
                    $pathArrays['directPaths'][$index]['train1Price'] = $train1PriceModel->getTicketPrice()['tickets'];
                    $index++;
                }
            }
            if ($pathArrays['intersections']) {
                $train2PriceModel = new TicketModel();
                $index = 0;
                foreach($pathArrays['intersections'] as $key => $value) {
                    $train1PriceModel->loadData(['start' => $pathArrays['intersections'][$index]['fssn'], 'destination' => $pathArrays['intersections'][$index]['isn']]);
                    $train2PriceModel->loadData(['start' => $pathArrays['intersections'][$index]['isn'], 'destination' => $pathArrays['intersections'][$index]['tsen']]);
                    
                    $pathArrays['intersections'][$index]['train1Price'] = $train1PriceModel->getTicketPrice()['tickets'];
                    $pathArrays['intersections'][$index]['train2Price'] = $train2PriceModel->getTicketPrice()['tickets'];
                    $index++;
                }
            }
            // adding available seats for the request

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

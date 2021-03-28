<?php

include_once "../classes/core/Controller.php";
include_once "../models/BookingModel.php";
include_once "../middlewares/AuthMiddleware.php";

class BookingController extends Controller
{

    private $authMiddleware;

    public function __construct()
    {
        $this->authMiddleware = new AuthMiddleware();
    }

    public function getAllBookings($request)
    {
        if (!$this->authMiddleware->isLoggedIn()) {
            return 'You are not logged in!!';
        }
        if ($request->isGet()) {
            // return database results
            return $this->render('myBookings');
        }
    }

    public function getBooking($request)
    {
        if (!$this->authMiddleware->isLoggedIn()) {
            return 'You are not logged in!';
        }

        if ($request->isGet()) {
            // return selected booking
            return $this->render('myBookings');
        }

    }

    public function createSeatBooking($request)
    {
        if (!$this->authMiddleware->isLoggedIn()) {
            return 'You are not logged in!';
        }

        if ($request->isGet()) {
            // return selected booking

            $option = $request->getQueryParams()['op'];
            $mode = $request->getQueryParams()['mode'];

            $fullTrainDetails = App::$APP->session->get($option);
            $train = $this->travellingTrains($mode, $fullTrainDetails);

            // remove the session after making a booking
            // $i = 0;
            // foreach($_SESSION as $key => $value) {
            //     $str = 'op' . $i;
            //     if($str === $key) {
            //         App::$APP->session->remove($str);
            //     }
            //     $i++;
            // }

            return $this->render('seatBooking', $train);
        }

    }

    private function travellingTrains($mode, $fullTrainDetails)
    {
        if ($mode === 'direct') {
            $train1 = null;

            if (isset($fullTrainDetails['fssn'])) {
                $train1['from'] = $fullTrainDetails['fssn'];
            }

            if (isset($fullTrainDetails['tsen'])) {
                $train1['to'] = $fullTrainDetails['tsen'];
            }

            if (isset($fullTrainDetails['train_name'])) {
                $train1['train_name'] = $fullTrainDetails['train_name'];
            }

            if (isset($fullTrainDetails['fssdt'])) {
                $train1['from_dept'] = $fullTrainDetails['fssdt'];
            }

            if (isset($fullTrainDetails['tseat'])) {
                $train1['to_arrt'] = $fullTrainDetails['tseat'];
            }

            if (isset($fullTrainDetails['total_time'])) {
                $train1['journey_time'] = $fullTrainDetails['total_time'];
            }

            $train1['train_no'] = 1;

            $trains['t1'] = $train1;

            $train['trains'] = $trains;
            $train['all_start'] = $fullTrainDetails['fssn'];
            $train['all_end'] = $fullTrainDetails['tsen'];

            return $train;

        }

        if ($mode === 'intersect') {
            $train1 = null;
            $train2 = null;

            // train 1

            if (isset($fullTrainDetails['fssn'])) {
                $train1['from'] = $fullTrainDetails['fssn'];
            }

            if (isset($fullTrainDetails['isn'])) {
                $train1['to'] = $fullTrainDetails['isn'];
            }

            if (isset($fullTrainDetails['frtn'])) {
                $train1['train_name'] = $fullTrainDetails['frtn'];
            }

            if (isset($fullTrainDetails['fssdt'])) {
                $train1['from_dept'] = $fullTrainDetails['fssdt'];
            }

            if (isset($fullTrainDetails['fsiat'])) {
                $train1['to_arrt'] = $fullTrainDetails['fsiat'];
            }

            if (isset($fullTrainDetails['ftitt'])) {
                $train1['journey_time'] = $fullTrainDetails['ftitt'];
            }

            $train1['train_no'] = 1;

            // train 2

            if (isset($fullTrainDetails['isn'])) {
                $train2['from'] = $fullTrainDetails['isn'];
            }

            if (isset($fullTrainDetails['tsen'])) {
                $train2['to'] = $fullTrainDetails['tsen'];
            }

            if (isset($fullTrainDetails['trtn'])) {
                $train2['train_name'] = $fullTrainDetails['trtn'];
            }

            if (isset($fullTrainDetails['tsidt'])) {
                $train2['from_dept'] = $fullTrainDetails['tsidt'];
            }

            if (isset($fullTrainDetails['tseat'])) {
                $train2['to_arrt'] = $fullTrainDetails['tseat'];
            }

            if (isset($fullTrainDetails['iterr'])) {
                $train2['journey_time'] = $fullTrainDetails['iterr'];
            }

            $train2['train_no'] = 2;

            $trains['t1'] = $train1;
            $trains['t2'] = $train2;

            $train['trains'] = $trains;
            $train['all_start'] = $fullTrainDetails['fssn'];
            $train['all_end'] = $fullTrainDetails['tsen'];
            $train['wait_time'] = $fullTrainDetails['wait_time'];

            return $train;
        }

        return false;
    }

    public function bookedTour($request)
    {
        if ($this->authMiddleware->isLoggedIn()) {
            if ($request->isGet()) {
                return $this->render('bookedTour');
            }
        } else {
            return 'your not logged in!';
        }
    }

    public function updateBooking()
    {
        // update
    }

    public function deleteBooking()
    {
        // delete
    }

    // admin
    public function bookingForTrain($request)
    {
        if ($this->authMiddleware->restrictTo('admin')) {
            if ($request->isGet()) { 
                $changeStatusModel = new BookingModel();
                $changeStatusModel->loadData($request->getQueryParams());
               
                $resultArray['reArray'] = $changeStatusModel->getDetails();

                return $this->render('bookingForATrain',$resultArray);
            }
        } else {
            return 'You are not authorized';
        }

    }

    public function manageFreights($request)
    {
        if ($this->authMiddleware->restrictTo('admin')) {
            if ($request->isGet()) {
                return $this->render(['admin', 'manageFreights']);
            }
        } else {
            return 'You are not authorized';
        }
    }

    public function manageBookings($request)
    {
        if ($this->authMiddleware->restrictTo('admin')) {
            if ($request->isGet()) {
                return $this->render(['admin', 'manageBookings']);
            }else{
                // $getNewsModel = new BookingModel();
                // $getNewsModel->loadData($request->getBody());
        
                // $trainArray['resultArray'] = $getNewsModel->searchBookingTrain();
                // return $this->render(['admin', 'manageBookings'],$trainArray);
            }
        } else {
            return 'You are not authorized';
        }
    }

    // public function SearchManageBookings($request){
    //     if ($request->isPost()){
    //         $saveDetailsModel = new BookingModel();
    //         $tempBody = $request->getBody();
    //         $tempBody['index1'] = $_POST['index1'];
    //         $newtempBody['index2'] = $_POST['index2'];
    //         $saveDetailsModel->loadData($tempBody, $newtempBody);

    //         $resultArray = $saveDetailsModel->newsearchBookingTrain(); 
           
    //         echo json_encode($resultArray);
    //     }

    // }

    public function freightBookingForTrain($request)
    {
        if ($this->authMiddleware->restrictTo('admin')) {
            if ($request->isGet()) {
                return $this->render('freightBookingForATrain');
            }
        } else {
            return 'You are not authorized';
        }
    }

    public function searchFreightTrains($request)
    {
        if ($request->isGet()) {
            return $this->render('freightSearch');
        }
    }

    public function bookFreight($request)
    {
        if ($this->authMiddleware->isLoggedIn()) {
            if ($request->isGet()) {
                return $this->render('bookFreight');
            }
        } else {
            return 'You are not logged in!';
        }
    }

    // checkout
    public function checkout($request)
    {
        if ($this->authMiddleware->isLoggedIn()) {
            
            if ($request->isGet()) {
                return $this->render('checkout');
            }

        }
    }

    public function bookingDetails($request){
        if ($this->authMiddleware->isLoggedIn()){
            if ($request->isPost()){
                $saveDetailsModel = new BookingModel();
                $tempBody = $request->getBody();
                $tempBody['index1'] = $_POST['index1'];
                $saveDetailsModel->loadData($tempBody);
                $bookingArray = $saveDetailsModel->getBookinDetails();
                echo json_encode($bookingArray);
                
            }

        }
        

    }

}

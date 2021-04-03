<?php
include_once "../classes/Controller.php";
include_once "../models/TrainModel.php";
class TrainController extends Controller
{

    public function form($request)
    {
        if ($request->isPost()) {
          
            return 'success';

        }

        return $this->render('getUserDetails');
    }
    public function getRoutesStations($request, $response){
        if ($request->isPost()){
            $saveDetailsModel = new TrainModel();
            $tempBody = $request->getBody();
            $tempBody['index1'] = $_POST['index1'];
            $saveDetailsModel->loadData($tempBody);
            $trainArray = $saveDetailsModel->getMyRoutsStations();
            echo json_encode($trainArray);
        }

    }


    public function updateRoutes($request, $response)
    {
        if ($request->isPost()) {
            

            $saveDetailsModel = new TrainModel();
            $tempBody = $request->getBody();
            $tempBody['index1'] = $_POST['index1'];
            $newtempBody['index2'] = $_POST['index2'];
            $saveDetailsModel->loadData($tempBody,$newtempBody);
            $trainArray = $saveDetailsModel->getMyRouts();
            echo json_encode($trainArray);
        }
    }
    public function newsearch($request)
    {

        if ($request->isGet()) {
            $saveDetailsModel = new TrainModel();
            $tempBody = $request->getBody();
            $tempBody = $request->getQueryParams();
            $saveDetailsModel->loadData($tempBody);

            $trainArrays = $saveDetailsModel->getMyTrains();
            //  var_dump($trainArrays);
            // // return $this->render(['admin', 'manageTrains'], $trainArrays);

            echo json_encode($trainArrays);
        }
    }

    public function register($request)
    {

        $userModel = new TrainModel();
        if ($request->isGet()) {
            $userModel->loadData($request->getBody());

            if ($userModel->createOne()) {
                return 'Success';
            }

            // return $this->render('register', [
            //     'model' => $userModel,
            // ]);

        }

        // return $this->render('register', [
        //     'model' => $userModel,
        // ]);
    }

    public function manageTrains($request)
    {

        // var_dump($request->getBody());
        if ($request->isGet()) {
            $searchModel = new TrainModel();
            $searchModel->loadData($request->getBody());

            $trainArrays = $searchModel->getTrains();
            //  var_dump($trainArrays);
            return $this->render(['admin', 'manageTrains'], $trainArrays);

        }

        if ($request->isPost()) {
            $searModel = new TrainModel();

            $searModel->loadData($request->getBody());

            $resultArray = $searModel->searchTrainDetails();

            return $this->render(['admin', 'manageTrains'], $resultArray);

        }

        //  return $this->render(['admin', 'manageTrains']);
    }

    public function updateTrain($request)
    {

        $saveDetailsModel = new TrainModel();
        $tempBody = $request->getBody();
        $tempBody['id'] = $request->getQueryParams()['id'];
        $saveDetailsModel->loadData($tempBody);
        // $updateTrainModel=new TrainModel();
        // var_dump($request->getQueryParams());

        // $updateTrainModel->loadData($request->getQueryParams());

        if ($request->isPost()) {

            $validationState = $saveDetailsModel->updateTrainDetails();

            if ($validationState === 'success') {

                $trainArray = $saveDetailsModel->getTrains();
                App::$APP->session->set('operation','success');
                return $this->render(['admin', 'manageTrains'], $trainArray);
            } else {
                $trainArray = $saveDetailsModel->getManageTrains();
                // var_dump($validationState);
                App::$APP->session->set('operation','fail');
                return $this->render(['admin', 'updateTrain'], $trainArray, $validationState);
                //     $registerSetValue = $saveDetailsModel->registerSetValue($validationState);

                //     $updateTrainArray=$saveDetailsModel->getManagTrains();
                //     // var_dump( $registerSetValue['train_travel_days']);
                //     return $this->render(['admin', 'updateTrain'],$updateTrainArray);

            }
            // $trainArray=$saveDetailsModel->getTrains();
            // return $this->render(['admin', 'manageTrains'],$trainArray);

        }
        $updateTrainArray = $saveDetailsModel->getManagTrains();

        //return $this->render(['admin', 'manageUsers'],$getUserArray);
        return $this->render(['admin', 'updateTrain'], $updateTrainArray);

        //  return $this->render(
        // return $this->render(['admin', 'updateTrain']);
    }

    public function deleteTrain($request)
    {

        if ($request->isGet()) {
            $deleteTrainModel = new TrainModel();
            // var_dump($request->getQueryParams());

            $deleteTrainModel->loadData($request->getQueryParams());
            $deleteTrainModel->deleteTrains();
            $trainArray = $deleteTrainModel->getTrains();

            return $this->render(['admin', 'manageTrains'], $trainArray);
            // return succsee;
        }

    }

    public function addTrain($request)
    {
        $saveTrainDetails = new TrainModel();
        $saveTrainDetails->loadData($request->getBody());
        if ($request->isPost()) {

            $validationState = $saveTrainDetails->addNewTrainDetails();

            if ($validationState === 'success') {
                $getrouteArray = $saveTrainDetails->getAvailableRoute();
                App::$APP->session->set('operation','success');
                return $this->render(['admin', 'addTrain'], $getrouteArray);
            } else {
                $registerSetValue = $saveTrainDetails->registerSetValue($validationState);
                //    var_dump($getrouteArray);
                // var_dump( $registerSetValue['train_travel_days']);
                // $this->render(['admin', 'addTrain'], $getrouteArray);
                App::$APP->session->set('operation','fail');
                return $this->render(['admin', 'addTrain'], $registerSetValue);

            }

        }
        $getrouteArray = $saveTrainDetails->getAvailableRoute();

        return $this->render(['admin', 'addTrain'], $getrouteArray);

    }

    public function ticketPrice($request)
    {
        if ($request->isPost()) {
            return $this->render('ticketPrice');
        }
        return $this->render('ticketPrice');

    }

    public function frieghtPrice($request)
    {
        if ($request->isPost()) {
            return $this->render('FreightServicePrice');
        }
        return $this->render('FreightServicePrice');

    }

    public function viewTicketPrice($request)
    {
        $viewTicketPrice = new TrainModel();
        $viewTicketPrice->loadData($request->getBody());
        if ($request->isPost()) {
            $viewTicketPrice->getTicketPrice();
            return $this->render('ticketPrice');
        }
        return $this->render('ticketPrice');
    }

}

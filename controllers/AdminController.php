<?php

include_once "../classes/core/Controller.php";
include_once "../controllers/AuthController.php";
include_once "../middlewares/AuthMiddleware.php";

class AdminController extends Controller
{
    public function protect()
    {
        $authMiddleware = new AuthMiddleware();

        if (!$authMiddleware->isLoggedIn()) {
            //return 'Your are not logged in!';
            echo 'Your are not logged in!';
            return false;
        }

        if (!$authMiddleware->restrictTo('admin')) {
            echo 'You are unorthorized to perform this action!!';
            return false;
        }
        return true;

    }

    // Admin's Specific functionalities //

    // manage users

    public function manageUsers($request)
    {

        if ($this->protect()) {
            $manageUserModel = new AdminModel();

            if ($request->isPost()) {
                $searchUser = new AdminModel();
                $searchUser->loadData($request->getBody());
                $getSearchResult = $searchUser->getSearchUserResult();
                return $this->render(['admin', 'manageUsers'], $getSearchResult);
            }

            $manageUserModel->loadData($request->getBody());
            $getUserArray = $manageUserModel->getUsers();
            return $this->render(['admin', 'manageUsers'], $getUserArray);

        }
    }

    public function addUser($request, $response)
    { //Admin page add user function

        $adminFunction = new AdminModel();

        if ($request->isPost()) {
            $adminFunction->loadData($request->getBody());
            $state = $adminFunction->addUser();

            if ($state === "success") {
                App::$APP->session->set('operation','success');
                return $response->redirect('/utrance-railway/users/add');
            } else {
                $addUserSetValue = $adminFunction->registerSetValue($state); //Ashika
                App::$APP->session->set('operation','fail');
                return $this->render(['admin', 'addUser'], $addUserSetValue); //Ashika
            }

        }
        return $this->render(['admin', 'addUser']);
    }

    public function viewUser($request)
    { //View users from manage users

        if ($request->isGet()) {
            $adminViewUser = new AdminModel();
            $adminViewUser->loadData($request->getQueryParams());
            $updateUserArray = $adminViewUser->getUserDetails();
            //$updateUserArray['users'][0]['id'] = $request->getQueryParams()['id'];
            //var_dump($updateUserArray);
            return $this->render(['admin', 'updateUser'], $updateUserArray);
        }

    }

    public function viewTrains($request)
    {
        if ($request->isGet()) {
            $adminViewTrain = new AdminModel();
            $adminViewTrain->loadData($request->getQueryParams());
            $updateTrainArray = $adminViewTrain->getTrainDetails();
            //$updateTrainArray['trains'][0]['trains_id']=$request->getQueryParams()['trains_id'];
            return $this->render(['admin', 'updateUser'], $updateTrainArray);
        }
    }

    public function updateUser($request, $response)
    { //update users from manage users

        if ($request->isPost()) {
            $saveDetailsModel = new AdminModel();

            $tempBody = $request->getBody();
            $id = $request->getQueryParams()['id'];
            $tempBody['id'] = $id;
            $saveDetailsModel->loadData($tempBody);
            $state = $saveDetailsModel->updateUserDetails();

            if ($state === "success") {
                App::$APP->session->set('operation','success');
                return $response->redirect('/utrance-railway/users/view?id=' . $id);
            } else {
                $commonArray = $saveDetailsModel->getUserDetails();
                $commonArray["updateSetValue"] = $saveDetailsModel->registerSetValue($state); //Ashika
                App::$APP->session->set('operation','fail');
                return $this->render(['admin', 'updateUser'], $commonArray); //Ashika
            }

        }
        return $this->render(['admin', 'updateUser']);

    }

    public function changeUserStatus($request, $response) /// Activate and deactivate part in manage users

    { //Ashika
        if ($request->isGet()) {
            $changeUserStatusModel = new AdminModel();
            $changeUserStatusModel->loadData($request->getQueryParams());
            $changeUserStatusModel->changeUserStatusDetails();
            $changeStatusArray = $changeUserStatusModel->getUsers();

        }
        $response->redirect('/utrance-railway/users');
    }

    public function filterSearch($request)
    {

        if ($request->isPost()) {
            $saveDetailsModel = new AdminModel();
            $tempBody = $request->getBody();
            $tempBody['index1'] = $_POST['index1'];
            $newtempBody['index2'] = $_POST['index2'];
            $saveDetailsModel->loadData($tempBody, $newtempBody);

            $trainArrays = $saveDetailsModel->getMyUsers();
            //  var_dump($trainArrays);
            // // return $this->render(['admin', 'manageTrains'], $trainArrays);

            echo json_encode($trainArrays);
        }
    }

    // manage trains

    public function newsearch($request)
    {

        if ($request->isPost()) {
            $saveDetailsModel = new AdminModel();
            $tempBody = $request->getBody();
            $tempBody['index1'] = $_POST['index1'];
            $newtempBody['index2'] = $_POST['index2'];
            $saveDetailsModel->loadData($tempBody, $newtempBody);

            $trainArrays = $saveDetailsModel->getMyTrains();
            //  var_dump($trainArrays);
            // // return $this->render(['admin', 'manageTrains'], $trainArrays);

            echo json_encode($trainArrays);
        }
    }

    public function manageTrains($request)
    {
        if ($this->protect()) {

            $searchModel = new AdminModel();
            $searchModel->loadData($request->getBody());
            if ($this->protect()) {
                if ($request->isPost()) {

                    $resultArray = $searchModel->searchTrainDetails();
                    return $this->render(['admin', 'manageTrains'], $resultArray);
                }

                $trainArrays = $searchModel->getTrains();
                return $this->render(['admin', 'manageTrains'], $trainArrays);
                // return $this->render($trainArrays);
                // return $trainArrays;

            }
        }
    }

    public function viewTrain($request)
    {
        if ($this->protect()) {

            if ($request->isGet()) {
                $saveDetailsModel = new AdminModel();

                $tempBody = $request->getBody();
                $tempBody['id'] = $request->getQueryParams()['id'];
                $saveDetailsModel->loadData($tempBody);

                $updateTrainArray = $saveDetailsModel->getManagTrains();
                $updateTrainArray['newArray'] = $saveDetailsModel->validateTrains($updateTrainArray);

                return $this->render(['admin', 'updateTrain'], $updateTrainArray);

            }
        }

    }

    public function updateTrain($request, $response)
    {

        if ($this->protect()) {
            if ($request->isPost()) {
                $saveDetailsModel = new AdminModel();

                $tempBody = $request->getBody();
                $tempBody['id'] = $request->getQueryParams()['id'];
                $id = $request->getQueryParams()['id'];
                $tempBody['id'] = $id;
                $saveDetailsModel->loadData($tempBody);

                $validationState = $saveDetailsModel->updateTrainDetails();
                //  var_dump($validationState);

                if ($validationState === "success") {
                    App::$APP->session->set('operation','success');
                    return $response->redirect('/utrance-railway/trains/view?id=' . $id);
                } else {

                    $trainArray = $saveDetailsModel->getManagTrains();
                    $registerSetValue = $saveDetailsModel->trainSetValue($validationState);
                    App::$APP->session->set('operation','fail');
                    return $this->render(['admin', 'updateTrain'], $trainArray, $registerSetValue);

                }

            }
        }

    }

    public function deleteTrain($request, $response)
    {
        echo "huh";

        if ($this->protect()) {

            if ($request->isGet()) {
                $deleteTrainModel = new AdminModel();

                $deleteTrainModel->loadData($request->getQueryParams());
                $deleteTrainModel->deleteTrains();
                // $trainArray=$deleteTrainModel->getTrains();
                // return $this->render(['admin', 'manageTrains'],$trainArray);
                return $response->redirect('/utrance-railway/trains');

            }
        }

    }

    public function activeTrain($request, $response)
    {

        if ($this->protect()) {

            if ($request->isGet()) {
                $deleteTrainModel = new AdminModel();

                $deleteTrainModel->loadData($request->getQueryParams());
                $deleteTrainModel->activeTrains();
                // $trainArray=$deleteTrainModel->getTrains();
                // return $this->render(['admin', 'manageTrains'],$trainArray);
                return $response->redirect('/utrance-railway/trains');

            }
        }

    }

    public function addTrain($request, $response)
    {
        if ($this->protect()) {
            $saveTrainDetails = new AdminModel();
            $saveTrainDetails->loadData($request->getBody());
            $getrouteArray['routes'] = $saveTrainDetails->getAvailableRoute();

            if ($request->isPost()) {
                $validationState = $saveTrainDetails->addNewTrainDetails();

                if ($validationState === 'success') {
                    // $getrouteArray = $saveTrainDetails->getAvailableRoute();

                    // return $this->render(['admin', 'addTrain'],$getrouteArray);
                    App::$APP->session->set('operation','success');
                    return $response->redirect('/utrance-railway/trains/add');
                } else {

                    $trainArray = $saveTrainDetails->trainSetValue($validationState);
                    $trainArray['routes'] = $saveTrainDetails->getAvailableRoute();

                    // var_dump( $registerSetValue['train_travel_days']);
                    // $this->render(['admin', 'addTrain'], $getrouteArray);
                    App::$APP->session->set('operation','fail');
                    return $this->render(['admin', 'addTrain'], $trainArray);
                }

            }
        }

        // var_dump($getrouteArray)
        return $this->render(['admin', 'addTrain'], $getrouteArray);
    }

    // manage routes
    public function getRoutesStations($request, $response)
    {
        if ($request->isPost()) {
            $saveDetailsModel = new AdminModel();
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

            $saveDetailsModel = new AdminModel();
            $tempBody = $request->getBody();
            $tempBody['index1'] = $_POST['index1'];
            $newtempBody['index2'] = $_POST['index2'];
            $saveDetailsModel->loadData($tempBody, $newtempBody);
            $trainArray = $saveDetailsModel->getMyRouts();
            echo json_encode($trainArray);
        }
    }

    public function manageRoutes($request)
    {

        if ($this->protect()) {
            $searchModel = new AdminModel();
            $searchModel->loadData($request->getBody());
            if ($request->isGet()) {

                $resultArray = $searchModel->getRoutes();

                return $this->render(['admin', 'manageRoutes'], $resultArray);

            } else if ($request->isPost()) {
                $resultArray = $searchModel->searchRouteDetails();

                return $this->render(['admin', 'manageRoutes'], $resultArray);

            }

        }
    }

    public function addRoute($request)
    {
        if ($this->protect()) {
            if ($request->isPost()) {
                return 'success';
            }

            return $this->render(['admin', 'addRoute']);
        }
    }

    public function viewRoute($request, $response)
    {
        if ($this->protect()) {
            if ($request->isGet()) {
                $saveDetailsModel = new AdminModel();

                $tempBody = $request->getBody();
                $tempBody['id'] = $request->getQueryParams()['id'];
                $saveDetailsModel->loadData($tempBody);

                $updateRouteArray = $saveDetailsModel->getManagRoutes();

                return $this->render(['admin', 'updateRoute'], $updateRouteArray);
            }

            // return $this->render(['admin', 'updateRoute']);
        }
    }

    ////////////////////////

    public function aboutUs()
    {

        return $this->render('aboutUs');

    }

    public function manageNews($request) //daranya

    {
        if ($this->protect()) {
            $manageNewsModel = new AdminModel();

            if ($request->isPost()) {
                $manageNewsModel->loadData($request->getbody());
                $addNewss = $manageNewsModel->manageNews();
                $updateUserArray = $adminViewUser->getUserDetails();
                //var_dump($addDetails);
                return $this->render(['admin', 'manageNews']);

            }
            return $this->render(['admin', 'manageNews']);
        }

    }

}

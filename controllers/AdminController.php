<?php

include_once "../classes/core/Controller.php";
include_once "../controllers/AuthController.php";
include_once "../middlewares/AuthMiddleware.php";

class AdminController extends Controller
{
    private function protect()
    {
        $authMiddleware = new AuthMiddleware();

        if (!$authMiddleware->isLoggedIn()) {
            echo 'Your are not logged in!';
            return false;
        }

        if (!$authMiddleware->restrictTo('admin')) {
            echo 'You are unauthorized to perform this action!!';
            return false;
        }
        return true;

    }

    // Admin's Specific functionalities //

    // manage users

    public function manageUsers($request, $response)
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

        $response->setStatusCode(403);
        return $response->redirect('/home');

    }

    public function addUser($request, $response)
    { //Admin page add user function

        if ($this->protect()) {

            $adminFunction = new AdminModel();

            if ($request->isPost()) {
                $adminFunction->loadData($request->getBody());
                $state = $adminFunction->addUser();

                if ($state === "success") {
                    return $response->redirect('/users/add');
                } else {
                    $addUserSetValue = $adminFunction->registerSetValue($state); //Ashika
                    return $this->render(['admin', 'addUser'], $addUserSetValue); //Ashika
                }

            }
            return $this->render(['admin', 'addUser']);
        }

        $response->setStatusCode(403);
        return $response->redirect('/home');

    }

    public function viewUser($request, $response)
    { //View users from manage users

        if ($this->protect()) {
            if ($request->isGet()) {
                $adminViewUser = new AdminModel();
                $adminViewUser->loadData($request->getQueryParams());
                $updateUserArray = $adminViewUser->getUserDetails();
                return $this->render(['admin', 'updateUser'], $updateUserArray);
            }
        }

        $response->setStatusCode(403);
        return $response->redirect('/home');

    }

    public function viewTrains($request, $response)
    {

        if ($this->protect()) {

            if ($request->isGet()) {
                $adminViewTrain = new AdminModel();
                $adminViewTrain->loadData($request->getQueryParams());
                $updateTrainArray = $adminViewTrain->getTrainDetails();
                return $this->render(['admin', 'updateUser'], $updateTrainArray);
            }
        }

        $response->setStatusCode(403);
        return $response->redirect('/home');

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
                return $response->redirect('/users/view?id=' . $id);
            } else {
                $commonArray = $saveDetailsModel->getUserDetails();
                $commonArray["updateSetValue"] = $saveDetailsModel->registerSetValue($state); //Ashika
                return $this->render(['admin', 'updateUser'], $commonArray); //Ashika
            }

        }
        return $this->render(['admin', 'updateUser']);

    }

    public function changeUserStatus($request, $response) /// Activate and deactivate part in manage users

    {
        if ($this->protect()) {

            if ($request->isGet()) {
                $changeUserStatusModel = new AdminModel();
                $changeUserStatusModel->loadData($request->getQueryParams());
                $changeUserStatusModel->changeUserStatusDetails();
                $changeStatusArray = $changeUserStatusModel->getUsers();

            }
        }
        $response->setStatusCode(403);
        $response->redirect('/home');
    }

    public function filterSearch($request, $response)
    {
        if ($this->protect()) {

            if ($request->isPost()) {
                $saveDetailsModel = new AdminModel();
                $tempBody = $request->getBody();
                $tempBody['index1'] = $_POST['index1'];
                $newtempBody['index2'] = $_POST['index2'];
                $saveDetailsModel->loadData($tempBody, $newtempBody);

                $trainArrays = $saveDetailsModel->getMyUsers();

                echo json_encode($trainArrays);
                return true;
            }
        }

        $response->setStatusCode(403);
        $response->redirect('/home');

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

                if ($validationState === "success") {

                    return $response->redirect('/trains/view?id=' . $id);
                } else {

                    $trainArray = $saveDetailsModel->getManagTrains();
                    $registerSetValue = $saveDetailsModel->trainSetValue($validationState);
                    return $this->render(['admin', 'updateTrain'], $trainArray, $registerSetValue);

                }

            }
        }

    }

    public function deleteTrain($request, $response)
    {
        if ($this->protect()) {

            if ($request->isGet()) {
                $deleteTrainModel = new AdminModel();

                $deleteTrainModel->loadData($request->getQueryParams());
                $deleteTrainModel->deleteTrains();
                return $response->redirect('/trains');

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
                return $response->redirect('/trains');

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
                    return $response->redirect('/utrance-railway/trains/add');
                } else {

                    $trainArray = $saveTrainDetails->trainSetValue($validationState);
                    $trainArray['routes'] = $saveTrainDetails->getAvailableRoute();

                    return $this->render(['admin', 'addTrain'], $trainArray);
                }

            }
        }

        return $this->render(['admin', 'addTrain'], $getrouteArray);
    }

    // manage routes
    public function getRoutesStations($request, $response)
    {

        if ($this->protect()) {

            if ($request->isPost()) {
                $saveDetailsModel = new AdminModel();
                $tempBody = $request->getBody();
                $tempBody['index1'] = $_POST['index1'];
                $saveDetailsModel->loadData($tempBody);
                $trainArray = $saveDetailsModel->getMyRoutsStations();
                echo json_encode($trainArray);
                return true;
            }
        }

        $response->setStatusCode(403);
        $response->redirect('/utrance-railway/home');

    }

    public function updateRoutes($request, $response)
    {
        if ($this->protect()) {

            if ($request->isPost()) {

                $saveDetailsModel = new AdminModel();
                $tempBody = $request->getBody();
                $tempBody['index1'] = $_POST['index1'];
                $newtempBody['index2'] = $_POST['index2'];
                $saveDetailsModel->loadData($tempBody, $newtempBody);
                $trainArray = $saveDetailsModel->getMyRouts();
                echo json_encode($trainArray);
                return true;
            }
        }

        $response->setStatusCode(403);
        $response->redirect('/utrance-railway/home');
    }

    public function manageRoutes($request, $response)
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

        $response->setStatusCode(403);
        $response->redirect('/utrance-railway/home');

    }

    public function addRoute($request, $response)
    {
        if ($this->protect()) {
            if ($request->isPost()) {
                // TODO: why is this?
                return 'success';
            }

            return $this->render(['admin', 'addRoute']);
        }

        $response->setStatusCode(403);
        $response->redirect('/utrance-railway/home');
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

        }

        $response->setStatusCode(403);
        $response->redirect('/utrance-railway/home');
    }

    ////////////////////////

    public function manageNews($request, $response)
    {
        #TODO: is this needed?
        if ($this->protect()) {
            $manageNewsModel = new AdminModel();

            if ($request->isPost()) {
                $manageNewsModel->loadData($request->getbody());
                $addNewss = $manageNewsModel->manageNews();
                $updateUserArray = $adminViewUser->getUserDetails();
                return $this->render(['admin', 'manageNews']);

            }
            return $this->render(['admin', 'manageNews']);
        }

        $response->setStatusCode(403);
        $response->redirect('/utrance-railway/home');

    }

}

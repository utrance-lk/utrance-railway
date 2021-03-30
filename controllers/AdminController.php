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
            return false;
        }

        if (!$authMiddleware->restrictTo('admin')) {
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
        return $response->redirect('/utrance-railway/home');
    }

    public function addUser($request, $response)
    { //Admin page add user function

        if ($this->protect()) {
            $adminFunction = new AdminModel();

            if ($request->isPost()) {
                $adminFunction->loadData($request->getBody());
                $state = $adminFunction->addUser();

                if ($state === "success") {
                    return $response->redirect('/utrance-railway/users/add');
                } else {
                    $addUserSetValue = $adminFunction->registerSetValue($state); //Ashika
                    return $this->render(['admin', 'addUser'], $addUserSetValue); //Ashika
                }

            }
            return $this->render(['admin', 'addUser']);
        }

        $response->setStatusCode(403);
        return $response->redirect('/utrance-railway/home');
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
        return $response->redirect('/utrance-railway/home');

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
        return $response->redirect('/utrance-railway/home');
    }

    public function updateUser($request, $response)
    { //update users from manage users

        if ($this->protect()) {

            if ($request->isPost()) {
                $saveDetailsModel = new AdminModel();

                $tempBody = $request->getBody();
                $id = $request->getQueryParams()['id'];
                $tempBody['id'] = $id;
                $saveDetailsModel->loadData($tempBody);
                $state = $saveDetailsModel->updateUserDetails();

                if ($state === "success") {
                    return $response->redirect('/utrance-railway/users/view?id=' . $id);
                } else {
                    $commonArray = $saveDetailsModel->getUserDetails();
                    $commonArray["updateSetValue"] = $saveDetailsModel->registerSetValue($state); //Ashika
                    return $this->render(['admin', 'updateUser'], $commonArray); //Ashika
                }

            }
            return $this->render(['admin', 'updateUser']);
        }

        $response->setStatusCode(403);
        return $response->redirect('/utrance-railway/home');

    }

    public function changeUserStatus($request, $response) /// Activate and deactivate part in manage users

    {

        if ($this->protect()) {
            if ($request->isGet()) {
                $changeUserStatusModel = new AdminModel();
                $changeUserStatusModel->loadData($request->getQueryParams());
                $changeUserStatusModel->changeUserStatusDetails();
                $changeStatusArray = $changeUserStatusModel->getUsers();
                // TODO: what is it doing here?
                return true;

            }

        }

        $response->setStatusCode(403);
        return $response->redirect('/utrance-railway/home');
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
        return $response->redirect('/utrance-railway/home');
    }

    // manage trains

    public function newsearch($request, $response)
    {
        if ($this->protect()) {

            if ($request->isPost()) {
                $saveDetailsModel = new AdminModel();
                $tempBody = $request->getBody();
                $tempBody['index1'] = $_POST['index1'];
                $newtempBody['index2'] = $_POST['index2'];
                $saveDetailsModel->loadData($tempBody, $newtempBody);

                $trainArrays = $saveDetailsModel->getMyTrains();

                echo json_encode($trainArrays);
                return true;
            }
        }

        $response->setStatusCode(403);
        return $response->redirect('/utrance-railway/home');
    }

    public function manageTrains($request, $response)
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

        $response->setStatusCode(403);
        return $response->redirect('/utrance-railway/home');
    }

    public function viewTrain($request, $response)
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

        $response->setStatusCode(403);
        return $response->redirect('/utrance-railway/home');

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

                    return $response->redirect('/utrance-railway/trains/view?id=' . $id);
                } else {

                    $trainArray = $saveDetailsModel->getManagTrains();
                    $registerSetValue = $saveDetailsModel->trainSetValue($validationState);
                    return $this->render(['admin', 'updateTrain'], $trainArray, $registerSetValue);

                }

            }
        }

        $response->setStatusCode(403);
        return $response->redirect('/utrance-railway/home');

    }

    public function deleteTrain($request, $response)
    {

        if ($this->protect()) {

            if ($request->isGet()) {
                $deleteTrainModel = new AdminModel();

                $deleteTrainModel->loadData($request->getQueryParams());

                $getResult['result'] = $deleteTrainModel->deleteTrains();
                return $response->redirect('/utrance-railway/trains');

            }
        }

        $response->setStatusCode(403);
        return $response->redirect('/utrance-railway/home');

    }

    public function activeTrain($request, $response)
    {

        if ($this->protect()) {

            if ($request->isGet()) {
                $deleteTrainModel = new AdminModel();

                $deleteTrainModel->loadData($request->getQueryParams());
                $deleteTrainModel->activeTrains();
                return $response->redirect('/utrance-railway/trains');

            }
        }

        $response->setStatusCode(403);
        return $response->redirect('/utrance-railway/home');

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

        // return $this->render(['admin', 'addTrain'], $getrouteArray);
        $response->setStatusCode(403);
        return $response->redirect('/utrance-railway/home');
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
        return $response->redirect('/utrance-railway/home');

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
        return $response->redirect('/utrance-railway/home');
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
        return $response->redirect('/utrance-railway/home');
    }

    public function addRoute($request, $response)
    {
        if ($this->protect()) {
            if ($request->isPost()) {
                return $this->render(['admin', 'addRoute']);
            }

            return $this->render(['admin', 'addRoute']);
        }

        $response->setStatusCode(403);
        return $response->redirect('/utrance-railway/home');
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

                return $this->render(['admin', 'updateRoute2'], $updateRouteArray);
            }

        }

        $response->setStatusCode(403);
        return $response->redirect('/utrance-railway/home');
    }

    ////////////////////////

    public function manageNews($request, $response) //hasani

    {
        if ($this->protect()) {
            $manageNewsModel = new AdminModel();
            $manageNewsModel->loadData($request->getBody());

            if ($request->isPost()) {

                $getNewsArray['error'] = $manageNewsModel->uploadNews();

                if (empty($getNewsArray['error'])) {

                    return $response->redirect('/utrance-railway/home');
                } else {
                    return $this->render(['admin', 'manageNews'], $getNewsArray);
                }

            }
            return $this->render(['admin', 'manageNews']);
        }

        $response->setStatusCode(403);
        return $response->redirect('/utrance-railway/home');

    }

    // TODO: is this function needed?
    public function newsFeed($request, $response)
    {

        if ($this->protect()) {

            if ($this->protect()) {
                if ($request->isGet()) {
                    $getNewsModel = new AdminModel();
                    $getNewsModel->loadData($request->getBody());

                    $trainArray['news'] = $getNewsModel->getAllNews();

                    return $this->render('newsFeed', $trainArray);
                }

            }
        }

        $response->setStatusCode(403);
        return $response->redirect('/utrance-railway/home');

    }

    public function getNews($request, $response)
    {

        // if ($this->protect()) {

            if ($request->isGet()) {
                $getNewsModel = new AdminModel();
                $getNewsModel->loadData($request->getBody());
                $trainArray = $getNewsModel->getNews();
                return json_encode($trainArray);
            } else {
                $saveDetailsModel = new AdminModel();
                $tempBody = $request->getBody();
                $tempBody['index1'] = $_POST['index1'];
                $saveDetailsModel->loadData($tempBody);
                $trainArray = $saveDetailsModel->getMyNews();
                return json_encode($trainArray);
            }

        // }

        // $response->setStatusCode(403);
        // return $response->redirect('/utrance-railway/home');
    }

    public function newsFeed01($request, $response)
    {

        if ($this->protect()) {

            $saveDetailsModel = new AdminModel();

            $tempBody = $request->getBody();
            $tempBody['id'] = $request->getQueryParams()['id'];
            $saveDetailsModel->loadData($tempBody);

            $updateRouteArray['news'] = $saveDetailsModel->getMyNews();
            $updateRouteArray['allnews'] = $saveDetailsModel->getAllNews();

            return $this->render(['newsFeed', 'newsFeed01'], $updateRouteArray);
        }

        $response->setStatusCode(403);
        return $response->redirect('/utrance-railway/home');

    }

    public function getaddRoutesStations($request, $response)
    {

        if ($this->protect()) {
            if ($request->isGet()) {
                $getNewsModel = new AdminModel();
                $getNewsModel->loadData($request->getBody());

                $trainArray = $getNewsModel->getaddRoutesStations();
                echo json_encode($trainArray);
                return true;
            }

        }

        $response->setStatusCode(403);
        return $response->redirect('/utrance-railway/home');

    }

    public function addupdateRoutes($request, $response)
    {

        if ($this->protect()) {

            if ($request->isGet()) {
                $getNewsModel = new AdminModel();
                $getNewsModel->loadData($request->getBody());

                $trainArray = $getNewsModel->getMyaddRouts();

                echo json_encode($trainArray);
                return true;
            }
        }

        $response->setStatusCode(403);
        return $response->redirect('/utrance-railway/home');
    }

    public function getNewBookingTrain($request, $response)
    {

        if ($this->protect()) {

            if ($request->isPost()) {
                $saveDetailsModel = new AdminModel();
                $tempBody = $request->getBody();
                $tempBody['index1'] = $_POST['index1'];
                $saveDetailsModel->loadData($tempBody);
                $trainArray = $saveDetailsModel->getNewBookingTrain();

                echo json_encode($trainArray);
                return true;
            }
        }

        $response->setStatusCode(403);
        return $response->redirect('/utrance-railway/home');
    }

    ///////////////Daranya///////////////////
    public function getMessages($request, $response)
    {

        if ($this->protect()) {

            if ($request->isPost()) {
                $getMessagesModel = new AdminModel();
                $tempBody = $request->getBody();
                $tempBody['index1'] = $_POST['index1'];
                $getMessagesModel->loadData($tempBody);
                $messageArray = $getMessagesModel->getMessages();

                echo json_encode($messageArray);
                return true;
            }
        }

        $response->setStatusCode(403);
        return $response->redirect('/utrance-railway/home');

    }

    public function getCount($request, $response)
    {

        if ($this->protect()) {

            if ($request->isPost()) {
                $getCountModel = new AdminModel();
                $tempBody = $request->getBody();
                $tempBody['index1'] = $_POST['index1'];
                $getCountModel->loadData($tempBody);
                $messageArray = $getCountModel->getCount();

                return json_encode($messageArray);
            }
        }

        $response->setStatusCode(403);
        return $response->redirect('/utrance-railway/home');

    }

}

<?php

include_once "../classes/core/Controller.php";
include_once "../controllers/AuthController.php";
include_once "../middlewares/AuthMiddleware.php";

class detailsProviderController extends Controller
{

    private function protect()
    {
        $authMiddleware = new AuthMiddleware();

        if(!$authMiddleware->isLoggedIn()) {
            return 'Your are not logged in!';
        }

        if (!$authMiddleware->restrictTo('detailsProvider')) {
            echo 'You are unorthorized to perform this action!!';
            return false;
        }
        return true;

    }

    public function detailsProviderSettings($request)
    {
        $detailsProviderSettingModel = new UserModel();
        if ($request->isPost()) {
            // form
            return 'success';
        }
        if ($request->isGet()) {
            $detailsProviderSettingModel->loadData($request->getBody());
            $getUserDetailsArray = $detailsProviderSettingModel->getUserDetailsAdmin();
            return $this->render('detailsProvider', $getUserDetailsArray);
        }
    }

    public function contactAdmin($request)
    {
        if($this->protect()) {
            if ($request->isPost()) {
                // form
                return 'success';
            }
            return $this->render(['detailsProvider', 'contactAdmin']);
        } else {
            return 'You are not authorized!';
        }

    }

    public function addNoticesBySource()
    {
        return $this->render('addNoticesBySource');
        echo "hy girl";
    }

    public function addNoticesBySourceNow()
    {
        echo "Added Notices!!";
    }

    public function sourceDashboard()
    {
        return $this->render('sourceDashboard');
        echo "Hello Sri Lanka";
    }

    public function sourceDashboardNow()
    {
        echo "Hello my world";
    }

    public function viewUsers2()
    {
        return $this->render('viewUsers');
        echo " View Users!!";
    }
    public function viewUsersNow2()
    {
        echo "Upload View Users form";
    }

}

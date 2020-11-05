<?php
include_once "../classes/core/Controller.php";
include_once "../models/getUserModel.php";
class formdetailsController extends Controller
{

    public function form($request)
    {
        if ($request->isPost()) {
            // form
            return 'success';

        }

        return $this->render('getUserDetails');
    }

    public function register($request)
    {

        $userModel = new getUserModel();
        if ($request->isPost()) {
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
}

<?php

include_once "../classes/core/Controller.php";
include_once "../models/PaymentModel.php";
include_once "../middlewares/AuthMiddleware.php";

class PaymentController extends Controller
{
    public function payment($request)
    {

        $authMiddleware = new AuthMiddleware();

        if ($authMiddleware->isLoggedIn()) {
            if ($request->isPost()) {
                var_dump($request->getBody());
                $payment = new PaymentModel();
                $payment->loadData($request->getBody());
                $payment->recordPayment();

                return $this->render('home');

            }

            
        }
        return $this->render('payment');
    }
}

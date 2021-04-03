<?php

include_once "../classes/Controller.php";
include_once "../models/PaymentModel.php";

class PaymentController extends Controller
{
    public function payment($request)
    {
        if ($request->isPost()) {
            $payment = new PaymentModel();
            $payment->loadData($request->getBody());
            $payment->recordPayment();
            return 1;
        }
    }
}

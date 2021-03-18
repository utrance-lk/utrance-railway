<?php

include_once "../classes/core/Model.php";
include_once "HandlerFactory.php";

class PaymentModel extends Model
{
    public $merchant_id;
    public $order_id;
    public $payhere_amount;
    public $payhere_currency;
    public $status_code;
    public $md5sig;
    private $local_md5sig;

    private $merchant_secret = '4pFoEGQkmjF49WTOwj17bQ4uTQbUJMUqc8W7p20s5aQW';

    public function recordPayment()
    {
        $this->local_md5sig = strtoupper(md5($this->merchant_id . $this->order_id . $this->payhere_amount . $this->payhere_currency . $this->status_code . strtoupper(md5($this->merchant_secret))));

        if (($this->local_md5sig === $this->md5sig) && ($this->status_code == 2)) {
            $query = APP::$APP->db->pdo->prepare("INSERT INTO payment (booking_id, amount, currency) VALUES (:booking_id, :amount, :currency)");
            $query->bindValue(":booking_id", $this->order_id);
            $query->bindValue(":amount", $this->payhere_amount);
            $query->bindValue(":currency", $this->payhere_currency);
            return $query->execute();
        }

        return false;

    }

}

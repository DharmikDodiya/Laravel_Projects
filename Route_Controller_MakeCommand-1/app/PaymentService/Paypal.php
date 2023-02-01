<?php
namespace App\PaymentService;



class Paypal implements PaymentServiceInterface{

    // private $transactionid;
    // public function __construct($transactionid){
    //     $this->transactionid = $transactionid;
    // }

    // public function Pay() : array{
    //     return [
    //         "amout" => 1200,
    //         "transaction" => $this->transactionid
    //     ];
    // }

    public function checkout():string{
        return "you checkout with paypal";
    }

}


?>
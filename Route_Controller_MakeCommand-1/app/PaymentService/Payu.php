<?php
namespace App\PaymentService;


class Payu implements PaymentServiceInterface{

    public function checkout():string
    {
        return "checkout with payu";
    }
}

?>

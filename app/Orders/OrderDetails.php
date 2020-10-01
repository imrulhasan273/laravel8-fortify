<?php

namespace App\Orders;

use App\Billing\PaymentGatewayContract;

class OrderDetails
{
    private $PaymentGateway;
    public function __construct(PaymentGatewayContract $PaymentGateway)
    {
        $this->PaymentGateway = $PaymentGateway;
    }

    public function all()
    {
        $this->PaymentGateway->setDiscount(500);

        return [
            'name' => 'Imrul',
            'address' => 'Savar, Dhaka'
        ];
    }
}

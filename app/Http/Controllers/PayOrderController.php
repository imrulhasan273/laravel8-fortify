<?php

namespace App\Http\Controllers;

use App\Billing\PaymentGatewayContract;
use App\Orders\OrderDetails;

class PayOrderController extends Controller
{
    public function store(OrderDetails $orderDetails, PaymentGatewayContract $PaymentGateway)
    {
        $order = $orderDetails->all();
        dd($PaymentGateway->charge(2500));
    }
}

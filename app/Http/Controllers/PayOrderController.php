<?php

namespace App\Http\Controllers;

use App\Billing\PaymentGateway;
use App\Billing\PaymentGatewayContract;
use App\Orders\OrderDetails;
use Illuminate\Http\Request;

class PayOrderController extends Controller
{



    public function store(OrderDetails $orderDetails, PaymentGatewayContract  $paymentGateway){
        // we also would like to inject the currency inside parameter, but we can't do that, so? ServiceProvider
        // we need to get rid of this line so we inject it in the store method
        $order = $orderDetails->all();
        dd($paymentGateway->charge(2500));
    }
}

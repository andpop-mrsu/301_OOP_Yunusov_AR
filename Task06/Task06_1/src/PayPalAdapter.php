<?php

namespace App;

use App\PayPal;

class PayPalAdapter implements PaymentAdapterInterface
{
    private $paypal;

    public function __construct(PayPal $paypal)
    {
        $this->paypal = $paypal;
    }

    public function collectMoney($amount): bool
    {
        $result = $this->paypal->transfer($this->paypal->getEmail(), $amount);
        if ($result === 'Paypal Success!') {
            return true;
        }
        return false;
    }
}

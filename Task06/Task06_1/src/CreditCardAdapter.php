<?php

namespace App;

use App\CreditCard;

class CreditCardAdapter implements PaymentAdapterInterface
{
    private $creditCard;

    public function __construct(CreditCard $creditCard)
    {
        $this->creditCard = $creditCard;
    }

    public function collectMoney($amount): bool
    {
        $result = $this->creditCard->authorizeTransaction($amount);
        if (strpos($result, 'Authorization code:') !== false) {
            return true;
        }
        return false;
    }
}

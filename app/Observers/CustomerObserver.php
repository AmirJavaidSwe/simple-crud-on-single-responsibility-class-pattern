<?php

namespace App\Observers;

use App\Models\Customer;
use App\Notifications\WelcomeNewCustomer;

class CustomerObserver
{
    public function created(Customer $customer)
    {
        $customer->notify(new WelcomeNewCustomer($customer));
    }
}

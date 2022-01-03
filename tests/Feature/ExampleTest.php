<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Support\Facades\Notification;  
use App\Notifications\WelcomeNewCustomer;  
use App\Models\Customer;  

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    
    public function test_will_create_customer_redirext_to_index_page()
    {
        Notification::fake();
        $response = $this->post(route('customer.store'), [
            'name' => "test",
            'email' => 'test@gmail.com'
        ]);
        $this->data = $data = Customer::latest('id')->first();
        $this->data->notify(new WelcomeNewCustomer($data));

        Notification::assertSentTo($this->data, WelcomeNewCustomer::class);
    }
}

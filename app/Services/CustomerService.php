<?php

namespace App\Services;

use App\Contracts\CustomerContract;
use App\Models\Customer;

class CustomerService implements CustomerContract
{

    protected $model;

    public function __construct(Customer $model)
    {
        $this->model = $model;
    }

    public function index()
    {
        $customers = $this->model->latest()->get();
        return $customers;
    }
    
    public function store($data)
    {
        $customer = $this->model->create($data);
        return $customer;
    }
    
    public function edit($id)
    {
        $customer = $this->model->find($id);
        return $customer;
    }
    
    public function update($data, $id)
    {
        $customer = $this->model->find($id);
        $customer->update($data);
        $customer->touch();
        return $customer;
    }
    
    public function destroy($id)
    {
        $this->model->find($id)->delete();
    }
}

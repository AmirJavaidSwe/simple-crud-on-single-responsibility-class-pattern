<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;
use App\Services\CustomerService;


class CustomerController extends Controller
{
    public $customerService;

    public function __construct(CustomerService $customerService)
    {
        $this->customerService = $customerService;
    }

    public function index()
    {
        $customers = $this->customerService->index();
        return view('customer.index', compact('customers'));
    }
    
    public function create()
    {
        return view('customer.create');
    }
    
    public function store(StoreCustomerRequest $request)
    {
        $customer = $this->customerService->store($request->all());
        return redirect(route('customer.index'))->with(['success' => 'Customer has been added successfully!']);
    }
    
    public function edit($id)
    {
        $customer = $this->customerService->edit($id);
        return view('customer.edit', compact('customer'));
    }
    
    public function update(UpdateCustomerRequest $request, $id)
    {
        $customer = $this->customerService->update($request->all(), $id);
        return redirect(route('customer.index'))->with(['success' => 'Customer has been updated successfully!']);
    }
    
    public function destroy($id)
    {
        $customer = $this->customerService->destroy($id);
        return redirect(route('customer.index'))->with(['success' => 'Customer has been deleted successfully!']);
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\CustomerService;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    protected $service;

    public function __construct(CustomerService $customerService)
    {
        $this->service = $customerService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customers = $this->service->all();

        $this->setPageTitle('Customer List', 'Customer List');
        return view('admin.customer.index', ['customers'=>$customers]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $edit = $this->service->find($id);

        $this->setPageTitle('Create Customer', 'Create Customer');
        return view('admin.customer.update-or-create', ['edit'=>$edit]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $this->service->deleteData($id);
        return back()->with('success','Customer deleted successfull.');
    }
}

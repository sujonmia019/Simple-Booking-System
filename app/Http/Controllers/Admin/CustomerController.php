<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customers = User::role(CUSTOMER_ROLE)->orderBy('created_at', 'DESC')->get();

        $this->setPageTitle('Customer List', 'Customer List');
        return view('admin.customer.index', ['customers'=>$customers]);
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $edit = User::where(['role_name'=>CUSTOMER_ROLE,'id'=>$id])->firstOrFail();

        $this->setPageTitle('Create Customer', 'Create Customer');
        return view('admin.customer.update-or-create', ['edit'=>$edit]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $data = User::where(['role_name'=>CUSTOMER_ROLE,'id'=>$id])->firstOrFail();
        $data->delete();
        return back()->with('success','Customer deleted successfull.');
    }
}

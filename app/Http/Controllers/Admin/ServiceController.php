<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Services\ProductService;
use App\Http\Controllers\Controller;

class ServiceController extends Controller
{
    protected $service;

    public function __construct(ProductService $productService)
    {
        $this->service = $productService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = $this->service->all();

        $this->setPageTitle('Service List', 'Service List');
        return view('admin.service.index', ['services'=>$services]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $edit = $this->service->find($id);

        $this->setPageTitle('Create Service', 'Create Service');
        return view('admin.service.update-or-create', ['edit'=>$edit]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->service->deleteData($id);
        return back()->with('success','Service deleted successfull.');
    }

}

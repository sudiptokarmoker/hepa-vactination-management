<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CustomerCreateRequest;
use App\Http\Requests\CustomerUpdateRequest;
use App\Interfaces\CustomerRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CustomerController extends Controller
{
    protected $customerObj;
    public function __construct(CustomerRepositoryInterface $customerObjInterface)
    {
        $this->customerObj = $customerObjInterface;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(CustomerCreateRequest $request)
    {
        try {
            $this->customerObj->create($request->all());
            return self::return_response('Customer Created Successfully',  true,[], 0, 200);
        } catch (\Exception $e) {
            return self::return_response($e->getMessage(),  false,[], 0, 417);
        }
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CustomerUpdateRequest $request)
    {
        try {
            $customer = $this->customerObj->update($request->all());
            if($customer)
            {
                return self::return_response('Customer Updated Successfully',  true,[], 0, 200);
            }
            else{
                return self::return_response('Invalid Email.',  false,[], 0, 417);
            }
        } catch (\Exception $e) {
            return self::return_response($e->getMessage(),  false,[], 0, 417);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function userProfile($id)
    {
        $userData = $this->customerObj->userInfo($id);
        if($userData) {
            return self::return_response('User info fetched successfully.',  true,['user_data'=>$userData], 0, 200);
        }else {
            return self::return_response('Invalid User.',  false,[], 0, 417);
        }
    }
}

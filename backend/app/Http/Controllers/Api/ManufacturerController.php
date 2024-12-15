<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ManufacturerCreateRequest;
use App\Http\Requests\ManufacturerUpdateRequest;
use App\Interfaces\ManufacturerRepositoryInterface;
use Illuminate\Http\Request;

class ManufacturerController extends Controller
{
    protected $manufacturerObj;
    public function __construct(ManufacturerRepositoryInterface $manufacturerObjInterface)
    {
        //dd('ok');
        $this->manufacturerObj = $manufacturerObjInterface;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $manufactures = $this->manufacturerObj->findAllManufacturerList();
        return self::return_response('Manufacturer list fetched Successfully',  true,['manufactures'=>$manufactures], 0, 200);
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
    public function store(ManufacturerCreateRequest $request)
    {
        //dd('manufacturer store method');
        try {
            $this->manufacturerObj->create($request->all());
            return self::return_response('Manufacturer Created Successfully',  true,[], 0, 200);
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
        try {
            $manufacturer = $this->manufacturerObj->find($id);
            return self::return_response('Manufacturer data fetched Successfully',  true,['manufacturer'=>$manufacturer], 0, 200);
        } catch (\Exception $e) {
            return self::return_response($e->getMessage(),  false,[], 0, 417);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ManufacturerUpdateRequest $request, string $id)
    {
        try {
            $this->manufacturerObj->update($request->all(),$id);
            return self::return_response('Manufacturer updated successfully',  true,[], 0, 200);
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
}

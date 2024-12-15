<?php

namespace App\Repositories;

use App\Interfaces\ManufacturerRepositoryInterface;
use App\Models\ManufacturerModel;
use Illuminate\Support\Facades\Hash;

class ManufacturerRepository implements ManufacturerRepositoryInterface
{
    public function findAllManufacturerList(){
        $data = ManufacturerModel::where('status',1)->get();
        return $data;

    }
    public function create(array $data){
       // dd('ok');
        $manufacturer = new ManufacturerModel();
        $manufacturer->manufacturer_name = $data['manufacturer_name'];
        $manufacturer->status = 1;
        $manufacturer->save();
        return $manufacturer;

    }
    public function update(array $data,$id){
        ManufacturerModel::where('id',$id)->update(['manufacturer_name'=>$data['manufacturer_name']]);

    }
    public function find($id){
        return ManufacturerModel::find($id);

    }
    public function findAll($id){

    }
    public function delete($id)
    {

    }
}

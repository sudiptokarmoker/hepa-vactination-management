<?php

namespace App\Interfaces;

interface ManufacturerRepositoryInterface
{
    public function findAllManufacturerList();
    public function create(array $data);
    public function update(array $data,$id);
    public function find($id);
    public function findAll($id);
    public function delete($id);
}

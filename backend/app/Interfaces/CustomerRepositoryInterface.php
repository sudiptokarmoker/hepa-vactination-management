<?php

namespace App\Interfaces;

interface CustomerRepositoryInterface
{
    public function create(array $data);
    public function update(array $data);
    public function find($id);
    public function findAll($id);
    public function delete($id);
    public function userInfo($id);
}

<?php

namespace App\Repositories\Interfaces;

interface CountryRepositoryInterface
{
    public function findAll(array $columns = ["*"]);
    public function findById($id);
    public function create(array $data);
    public function update($id, array $data);
    public function delete($id);
}

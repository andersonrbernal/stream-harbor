<?php

namespace App\Repositories\Interfaces;

interface UserRepositoryInterface
{
    public function findAll(array $columns = ['*']);
    public function findById($id);
    public function findByEmail(string $email);
    public function paginate(array $columns = ['*']);
    public function create(array $data);
    public function update($id, array $data);
    public function delete($id);
}

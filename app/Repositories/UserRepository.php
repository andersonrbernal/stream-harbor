<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\Interfaces\UserRepositoryInterface;

class UserRepository implements UserRepositoryInterface
{
    protected $user;

    public function __construct(User $userModel)
    {
        $this->user = $userModel;
    }

    public function findAll(array $columns = ['*'])
    {
        return $this->user->all($columns);
    }

    public function findById($id)
    {
        return $this->user->find($id);
    }

    public function findByEmail(string $email)
    {
        return $this->user->where('email', $email)->first();
    }

    public function paginate(array $columns = ['*'])
    {
        return $this->user->paginate($columns);
    }

    public function create($data)
    {
        return $this->user->create($data);
    }

    public function update($id, $data)
    {
        return $this->user->find($id)->update($data);
    }

    public function delete($id)
    {
        return $this->user->find($id)->delete();
    }
}

<?php

namespace App\Repositories;

use App\Models\Country;
use App\Repositories\Interfaces\CountryRepositoryInterface;

class CountryRepository implements CountryRepositoryInterface
{
    protected $country;

    public function __construct(Country $country)
    {
        $this->country = $country;
    }

    public function findAll(array $columns = ['*']) {
        return $this->country->all($columns);
    }

    public function findById($id) {
        return $this->country->find($id);
    }

    public function create(array $data)
    {
        return $this->country->create($data);
    }

    public function update($id, array $data)
    {
        return $this->country->find($id)->update($data);
    }

    public function delete($id) {
        return $this->country->find($id)->delete();
    }
}

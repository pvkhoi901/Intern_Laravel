<?php

namespace App\Repositories;

interface BaseRepositoryInterface
{
    // public function all();

    public function paginate(array $input = [], $perPage = 10);

    public function save(array $inputs, array $conditons = []);

    public function findById($id);

    public function deleteById($id);
}

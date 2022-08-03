<?php

namespace App\Repositories;

interface BaseRepositoryInterface
{
    public function paginate(array $input = [], $perPage = 10);

    public function save(array $inputs, array $conditions = []);

    public function findById($id);

    public function deleteById($id);
}

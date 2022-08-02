<?php

namespace App\Repositories;

class BaseRepository implements BaseRepositoryInterface
{
    protected $model;

    public function paginate(array $input = [], $perPage = 2)
    {
        $query = $this->model->query();

        return $query->paginate($perPage);
    }

    public function save(array $inputs, array $conditions = ['id' => null])
    {
        return $this->model->updateOrCreate($conditions, $inputs);
    }

    public function findById($id)
    {
        return $this->model->findOrFail($id);
    }

    public function deleteById($id)
    {
        return $this->model->destroy($id);
    }
}

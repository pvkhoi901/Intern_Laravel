<?php

namespace App\Repositories\Admin\PhoneZalo;

use App\Models\PhoneZalo;
use App\Repositories\BaseRepository;

class PhoneZaloRepository extends BaseRepository implements PhoneZaloRepositoryInterface
{
    public function __construct(PhoneZalo $model)
    {
        $this->model = $model;
    }
}

<?php

namespace App\Admin\Repositories;

use App\Models\Status as Model;
use Dcat\Admin\Repositories\EloquentRepository;

class Status extends EloquentRepository
{
    /**
     * Model.
     *
     * @var string
     */
    protected $eloquentClass = Model::class;
}

<?php

namespace App\Admin\Repositories;

use App\Models\NbPost as Model;
use Dcat\Admin\Repositories\EloquentRepository;

class NbPost extends EloquentRepository
{
    /**
     * Model.
     *
     * @var string
     */
    protected $eloquentClass = Model::class;
}

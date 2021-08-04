<?php

namespace App\Admin\Repositories;

use App\Models\DomainName as Model;
use Dcat\Admin\Repositories\EloquentRepository;

class DomainName extends EloquentRepository
{
    /**
     * Model.
     *
     * @var string
     */
    protected $eloquentClass = Model::class;
}

<?php

namespace App\Admin\Repositories;

use App\Models\Password as Model;
use Dcat\Admin\Repositories\EloquentRepository;

class Password extends EloquentRepository
{
    /**
     * Model.
     *
     * @var string
     */
    protected $eloquentClass = Model::class;

    public function getParentColumn()
    {
        return 'domain_id';
    }
}

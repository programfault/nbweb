<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\Article;
use App\Models\Domain;
use App\Models\Status;
use App\Models\Website;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Http\Controllers\AdminController;
use Symfony\Component\HttpFoundation\Request;

class ResourceController extends AdminController
{
    public function domains(Request $request)
    {
        return Domain::all(['id', 'name as text']);
    }

    public function status(Request $request)
    {
        return Status::all(['id', 'name as text']);
    }

    public function websites(Request $request)
    {
        return Website::all(['id', 'name as text']);
    }
}

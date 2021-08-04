<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\Domain;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Http\Controllers\AdminController;

class DomainController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(Domain::with('domain'), function (Grid $grid) {
            $grid->column('id')->sortable();
            $grid->column('name');
            $grid->column('description');
            $grid->column('domain.name','所属领域')->sortable();
            $grid->column('created_at');
            $grid->column('updated_at')->sortable();

            $grid->filter(function (Grid\Filter $filter) {
                $filter->equal('id');
            });
        });
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     *
     * @return Show
     */
    protected function detail($id)
    {
        return Show::make($id, Domain::with('domain'), function (Show $show) {
            $show->field('id');
            $show->field('name');
            $show->field('description');
            $show->field('domain.name','parent');
            $show->field('created_at');
            $show->field('updated_at');
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Form::make(Domain::with('domain'), function (Form $form) {
            $form->display('id');
            $form->select('domain_id')->options(function ($id) {
                $domain = \App\Models\Domain::find($id);
                if ($domain) {
                    return [$domain->id => $domain->name];
                }
            })->ajax('api/domains');
            $form->text('name');
            $form->text('description');
            $form->display('created_at');
            $form->display('updated_at');
        });
    }
}

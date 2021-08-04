<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\Website;
use App\Models\Domain;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Http\Controllers\AdminController;

class WebsiteController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(Website::with('domain'), function (Grid $grid) {
            $grid->column('id')->sortable();
            $grid->column('name');
            $grid->column('ip');
            $grid->column('domain.name','domain');
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
        return Show::make($id, Website::with('domain'), function (Show $show) {
            $show->field('id');
            $show->field('name');
            $show->field('ip');
            $show->field('domain.name','domain');
//            $show->field('created_at');
//            $show->field('updated_at');
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Form::make(new Website(), function (Form $form) {
            $form->display('id');
            $form->text('name');
            $form->text('ip');
            $form->select('domain_id')->options(function ($id) {
                $domain = Domain::find($id);
                if ($domain) {
                    return [$domain->id => $domain->name];
                }
            })->ajax('api/domains');
//            $form->display('created_at');
//            $form->display('updated_at');
        });
    }
}

<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\NbPost;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Http\Controllers\AdminController;

class NbPostController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new NbPost(), function (Grid $grid) {
            $grid->column('id')->sortable();
            $grid->column('title');
            $grid->column('slug');
            $grid->column('description');
            $grid->column('content');
            $grid->column('website_id');
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
        return Show::make($id, new NbPost(), function (Show $show) {
            $show->field('id');
            $show->field('title');
            $show->field('slug');
            $show->field('description');
            $show->field('content');
            $show->field('website_id');
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
        return Form::make(new NbPost(), function (Form $form) {
            $form->display('id');
            $form->text('title');
            $form->text('slug');
            $form->text('description');
            $form->text('content');
            $form->text('website_id');
        
            $form->display('created_at');
            $form->display('updated_at');
        });
    }
}

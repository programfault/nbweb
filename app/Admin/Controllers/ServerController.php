<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\Server;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Http\Controllers\AdminController;

class ServerController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new Server(), function (Grid $grid) {
            $grid->column('id')->sortable();
            $grid->column('address');
            $grid->column('username');
            $grid->column('password');
            $grid->column('buy_time');
            $grid->column('expired_time');
            $grid->column('cost');
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
        return Show::make($id, new Server(), function (Show $show) {
            $show->field('id');
            $show->field('address');
            $show->field('username');
            $show->field('password');
            $show->field('buy_time');
            $show->field('expired_time');
            $show->field('cost');
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
        return Form::make(new Server(), function (Form $form) {
            $form->display('id');
            $form->text('address');
            $form->text('username');
            $form->text('password');
            $form->datetime('buy_time')->format('YYYY-MM-DD');
            $form->datetime('expired_time')->format('YYYY-MM-DD');
            $form->text('cost');
            $form->display('created_at');
            $form->display('updated_at');
        });
    }
}

<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\Article;
use App\Models\Status;
use App\Models\Website;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Http\Controllers\AdminController;
use Illuminate\Support\Facades\DB;

class ArticleController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(Article::with(['website','status']), function (Grid $grid) {
            $grid->column('id')->sortable();
            $grid->column('title');
            $grid->column('slug');
            $grid->column('description');
            $grid->column('content');
            $grid->column('website.name','website');
            $grid->column('status.name','status');
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
        return Show::make($id, Article::with(['website','status']), function (Show $show) {
            $show->field('id');
            $show->field('title');
            $show->field('slug');
            $show->field('description');
            $show->field('content');
            $show->field('website.name','website');
            $show->field('status.name','status');
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
        return Form::make(new Article(), function (Form $form) {
            $form->display('id');
            $form->text('title');
            $form->text('slug')->disable();;
            $form->text('description');
            $form->editor('content')->languageUrl(url('TinyMCE/langs/de.js'));
            $form->select('website_id')->options('/api/websites');
            $form->select('status_id')->options('/api/status');

            $form->display('created_at');
            $form->display('updated_at');
        });
    }
}

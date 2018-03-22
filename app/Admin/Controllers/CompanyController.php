<?php

namespace App\Admin\Controllers;

use App\Company;

use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;
use \Illuminate\Http\Request;

class CompanyController extends Controller
{
    use ModelForm;

    /**
     * Index interface.
     *
     * @return Content
     */
    public function index()
    {
        return Admin::content(function (Content $content) {

            $content->header('header');
            $content->description('description');

            $content->body($this->grid());
        });
    }

    /**
     * Edit interface.
     *
     * @param $id
     * @return Content
     */
    public function edit($id)
    {
        return Admin::content(function (Content $content) use ($id) {

            $content->header('header');
            $content->description('description');

            $content->body($this->form()->edit($id));
        });
    }

    /**
     * Create interface.
     *
     * @return Content
     */
    public function create()
    {
        return Admin::content(function (Content $content) {

            $content->header('header');
            $content->description('description');

            $content->body($this->form());
        });
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Admin::grid(Company::class, function (Grid $grid) {

            $grid->id('ID')->sortable();
            $grid->column('name');
            $grid->column('description');
            $grid->column('image');
            $grid->rooms('# of Rooms')->display(function($rooms) {
                $count = count($rooms);
                return "<span class='label label-warning'>{$count}</span>";
            });
            $grid->created_at();
            $grid->updated_at();
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Admin::form(Company::class, function (Form $form) {

            $form->display('id', 'ID');

            $form->display('name', 'Name');
            $form->display('description', 'Description');
            $form->display('image', 'Image');
            $form->display('created_at', 'Created At');
            $form->display('updated_at', 'Updated At');
        });
    }

    protected function companies(Request $request)
    {
        $q = $request->get('q');
    
        return Company::where('name', 'ilike', "%$q%")->paginate(null, ['id', 'name as text']);
    }
}

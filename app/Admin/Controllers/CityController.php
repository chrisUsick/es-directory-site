<?php

namespace App\Admin\Controllers;

use App\City;
use App\Company;

use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;
use \Illuminate\Http\Request;

class CityController extends Controller
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

            $content->header('Cities');
            $content->description('Manage cities');

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
        return Admin::grid(City::class, function (Grid $grid) {

            $grid->id('ID')->sortable();
            $grid->column('name');
            $grid->column('slug');
            $grid->column('description');
            $grid->column('enabled')->display(function($val) {
                return $val ? 'True' : 'False'; 
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
        return Admin::form(City::class, function (Form $form) {

            $form->display('id', 'ID');
            $form->display('name', 'Name');
            $form->display('slug', 'Slug');
            $form->display('description', 'Description');
            $form->switch('enabled', 'Enabled')->options(['on' => ['value' => true, 'text' => 'Yes', 'color' => 'success'], 'off' => ['value' => false, 'text' => 'False']])->default(true);
            $form->multipleSelect('companies', 'Companies')->options(Company::all()->pluck('name', 'id'));
        });
    }

    protected function cities(Request $request)
    {
        $q = $request->get('q');
    
        return City::where('name', 'ilike', "%$q%")->paginate(null, ['id', 'name as text']);
    }
}

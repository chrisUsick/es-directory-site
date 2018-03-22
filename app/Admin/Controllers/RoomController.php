<?php

namespace App\Admin\Controllers;

use App\Room;
use App\City;
use App\Company;

use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;

class RoomController extends Controller
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
        return Admin::grid(Room::class, function (Grid $grid) {

            $grid->id('ID')->sortable();
            $grid->name()->sortable();
            $grid->address();
            $grid->difficulty();

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
        return Admin::form(Room::class, function (Form $form) {

            $form->display('id', 'ID');
            $form->text('name');
            $form->text('address');
            $form->text('difficulty');
            $form->textarea('description')->rows(4);
            $form->text('image', 'Image');
            $form->text('bookingLink', 'Booking Link');
            $form->select('city_id', 'City')->options(function ($id) {
                $city = City::find($id);
            
                if ($city) {
                    return [$city->id => $city->name];
                }
            })->ajax('/admin/api/cities');
            $form->select('company_id', 'Company')->options(function ($id) {
                $company = Company::find($id);
            
                if ($company) {
                    return [$company->id => $company->name];
                }
            })->ajax('/admin/api/companies');
            $form->display('created_at', 'Created At');
            $form->display('updated_at', 'Updated At');
        });
    }
}

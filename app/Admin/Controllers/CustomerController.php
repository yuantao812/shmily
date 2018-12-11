<?php

namespace App\Admin\Controllers;

use App\Address;
use App\Contact;
use App\Customer;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Column;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Row;
use Encore\Admin\Show;

class CustomerController extends Controller
{
    use HasResourceActions;

    /**
     * Index interface.
     *
     * @param Content $content
     * @return Content
     */
    public function index(Content $content)
    {
        return $content
            ->header('Index')
            ->description('description')
            ->body($this->grid());
    }

    /**
     * Show interface.
     *
     * @param mixed $id
     * @param Content $content
     * @return Content
     */
    public function show($id, Content $content)
    {

        $show = new Show(Customer::findOrFail($id));

        $show->id('Id');
        $show->customer_no('Customer no');
        $show->customer_status('Customer status');
        $show->company_name('Company name');
        $show->shop_name('Shop name');
        $show->customer_industry('Customer industry');
        $show->customer_type('Customer type');
        $show->shop_type('Shop type');
        $show->customer_area('Customer area');
        $show->customer_level('Customer level');
        $show->customer_nature('Customer nature');
        $show->customer_introducer('Customer introducer');
        $show->employee_introducer('Employee introducer');
        $show->success_time('Success time');
        $show->to_customer_time('To customer time');
        $show->to_open_sea_time('To open sea time');
        $show->close_time('Close time');
        $show->active_time('Active time');
        $show->loss_time('Loss time');
        $show->protect_user('Protect user');
        $show->creator('Creator');
        $show->deleted_at('Deleted at');
        $show->created_at('Created at');
        $show->updated_at('Updated at');

        $contactGrid = new Grid(new Contact);
        $contactGrid->model()->where('customer_id', '=', $id);
        $contactGrid->resource('/admin/contacts');
        $contactGrid->id();
        $contactGrid->customer_id();
        $contactGrid->man();
        $contactGrid->department();
        $contactGrid->title();
        $contactGrid->email();
        $contactGrid->mobile();
        $contactGrid->qq();
        $contactGrid->wechat();

        $addressGrid = new Grid(new Address);
        $addressGrid->model()->where('customer_id', '=', $id);
        $addressGrid->resource('/admin/address');
        $addressGrid->id();
        $addressGrid->customer_id();
        $addressGrid->address_type();
        $addressGrid->address();
        $content->header('Detail')->description('description');
        $content->row(function (Row $row) use ($show, $contactGrid, $addressGrid) {
            $row->column(4, $show);
            $row->column(8, function (Column $column) use ($show, $contactGrid, $addressGrid) {
                $column->row($contactGrid);
                $column->row($addressGrid);
            });
        });
        return $content;
    }

    /**
     * Edit interface.
     *
     * @param mixed $id
     * @param Content $content
     * @return Content
     */
    public function edit($id, Content $content)
    {
        return $content
            ->header('Edit')
            ->description('description')
            ->body($this->form()->edit($id));
    }

    /**
     * Create interface.
     *
     * @param Content $content
     * @return Content
     */
    public function create(Content $content)
    {
        return $content
            ->header('Create')
            ->description('description')
            ->body($this->form());
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Customer);

        $grid->id('Id');
        $grid->customer_no('Customer no');
        $grid->customer_status('Customer status');
        $grid->company_name('Company name');
        $grid->shop_name('Shop name');
        $grid->customer_industry('Customer industry');
        $grid->customer_type('Customer type');
        $grid->shop_type('Shop type');
        $grid->customer_area('Customer area');
        $grid->customer_level('Customer level');
        $grid->customer_nature('Customer nature');
        $grid->customer_introducer('Customer introducer');
        $grid->employee_introducer('Employee introducer');
        $grid->success_time('Success time');
        $grid->to_customer_time('To customer time');
        $grid->to_open_sea_time('To open sea time');
        $grid->close_time('Close time');
        $grid->active_time('Active time');
        $grid->loss_time('Loss time');
        $grid->protect_user('Protect user');
        $grid->creator('Creator');
        $grid->deleted_at('Deleted at');
        $grid->created_at('Created at');
        $grid->updated_at('Updated at');

        $grid->filter(function ($filter) {
            // 去掉默认的id过滤器
            $filter->disableIdFilter();
            $filter->column(1 / 2, function ($filter) {
                $filter->equal('customer_status')->default(1);
                $filter->like('customer_no');
                $filter->group('shop_type', function ($group) {
                    $group->gt('大于');
                    $group->lt('小于');
                    $group->nlt('不小于');
                    $group->ngt('不大于');
                    $group->equal('等于');
                });
                $filter->between('customer_type');
            });
            $filter->column(1 / 2, function ($filter) {
                $filter->equal('shop_name');
                $filter->between('close_time')->datetime();
                $filter->equal('company_name');
            });
        });

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Customer::findOrFail($id));

        $show->id('Id');
        $show->customer_no('Customer no');
        $show->customer_status('Customer status');
        $show->company_name('Company name');
        $show->shop_name('Shop name');
        $show->customer_industry('Customer industry');
        $show->customer_type('Customer type');
        $show->shop_type('Shop type');
        $show->customer_area('Customer area');
        $show->customer_level('Customer level');
        $show->customer_nature('Customer nature');
        $show->customer_introducer('Customer introducer');
        $show->employee_introducer('Employee introducer');
        $show->success_time('Success time');
        $show->to_customer_time('To customer time');
        $show->to_open_sea_time('To open sea time');
        $show->close_time('Close time');
        $show->active_time('Active time');
        $show->loss_time('Loss time');
        $show->protect_user('Protect user');
        $show->creator('Creator');
        $show->deleted_at('Deleted at');
        $show->created_at('Created at');
        $show->updated_at('Updated at');

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Customer);

        $form->text('customer_no', 'Customer no');
        $form->switch('customer_status', 'Customer status');
        $form->text('company_name', 'Company name');
        $form->text('shop_name', 'Shop name');
        $form->text('customer_industry', 'Customer industry');
        $form->text('customer_type', 'Customer type');
        $form->text('shop_type', 'Shop type');
        $form->text('customer_area', 'Customer area');
        $form->text('customer_level', 'Customer level');
        $form->text('customer_nature', 'Customer nature');
        $form->number('customer_introducer', 'Customer introducer');
        $form->number('employee_introducer', 'Employee introducer');
        $form->datetime('success_time', 'Success time')->default(date('Y-m-d H:i:s'));
        $form->datetime('to_customer_time', 'To customer time')->default(date('Y-m-d H:i:s'));
        $form->datetime('to_open_sea_time', 'To open sea time')->default(date('Y-m-d H:i:s'));
        $form->datetime('close_time', 'Close time')->default(date('Y-m-d H:i:s'));
        $form->datetime('active_time', 'Active time')->default(date('Y-m-d H:i:s'));
        $form->datetime('loss_time', 'Loss time')->default(date('Y-m-d H:i:s'));
        $form->number('protect_user', 'Protect user');
        $form->number('creator', 'Creator');

        return $form;
    }
}

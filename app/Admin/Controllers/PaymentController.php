<?php

namespace App\Admin\Controllers;

use App\Payment;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class PaymentController extends Controller
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
        return $content
            ->header('Detail')
            ->description('description')
            ->body($this->detail($id));
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
        $grid = new Grid(new Payment);

        $grid->id('Id');
        $grid->detail_id('Detail id');
        $grid->contract_id('Contract id');
        $grid->customer_id('Customer id');
        $grid->collect_type('Collect type');
        $grid->collect_status('Collect status');
        $grid->collect_voucher('Collect voucher')->lightbox(['zooming' => true, 'width' => 50, 'height' => 50]);
        $grid->collect_account('Collect account');
        $grid->collect_amount('Collect amount');
        $grid->al_collect_amount('Al collect amount');
        $grid->expect_collect_time('Expect collect time');
        $grid->collect_time('Collect time');
        $grid->check_user('Check user');
        $grid->check_date('Check date');
        $grid->is_invoice('Is invoice');
        $grid->remark('Remark');
        $grid->creator('Creator');
        $grid->deleted_at('Deleted at');
        $grid->created_at('Created at');
        $grid->updated_at('Updated at');

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
        $show = new Show(Payment::findOrFail($id));

        $show->id('Id');
        $show->detail_id('Detail id');
        $show->contract_id('Contract id');
        $show->customer_id('Customer id');
        $show->collect_type('Collect type');
        $show->collect_status('Collect status');
        $show->collect_voucher('Collect voucher');
        $show->collect_account('Collect account');
        $show->collect_amount('Collect amount');
        $show->al_collect_amount('Al collect amount');
        $show->expect_collect_time('Expect collect time');
        $show->collect_time('Collect time');
        $show->check_user('Check user');
        $show->check_date('Check date');
        $show->is_invoice('Is invoice');
        $show->remark('Remark');
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
        $form = new Form(new Payment);

        $form->text('detail_id', 'Detail id');
        $form->text('contract_id', 'Contract id');
        $form->text('customer_id', 'Customer id');
        $form->text('collect_type', 'Collect type');
        $form->text('collect_status', 'Collect status');
        $form->image('collect_voucher', '汇款凭证');
        $form->text('collect_account', 'Collect account');
        $form->decimal('collect_amount', 'Collect amount');
        $form->decimal('al_collect_amount', 'Al collect amount');
        $form->date('expect_collect_time', 'Expect collect time')->default(date('Y-m-d'));
        $form->date('collect_time', 'Collect time')->default(date('Y-m-d'));
        $form->text('check_user', 'Check user');
        $form->date('check_date', 'Check date')->default(date('Y-m-d'));
        $form->text('is_invoice', 'Is invoice');
        $form->text('remark', 'Remark');
        $form->text('creator', 'Creator');

        return $form;
    }
}

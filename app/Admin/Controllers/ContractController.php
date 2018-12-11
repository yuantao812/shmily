<?php

namespace App\Admin\Controllers;

use App\Contract;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class ContractController extends Controller
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
        $grid = new Grid(new Contract);

        $grid->id('Id');
        $grid->customer_id('Customer id');
        $grid->chance_id('Chance id');
        $grid->contract_no('Contract no');
        $grid->contract_status('Contract status');
        $grid->contract_amount('Contract amount');
        $grid->contract_short('Contract short');
        $grid->sign_date('Sign date');
        $grid->receive_date('Receive date');
        $grid->electronic('Electronic');
        $grid->remark('Remark');
        $grid->creator('Creator');
        $grid->is_low_price('Is low price');
        $grid->contract_pid('Contract pid');
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
        $show = new Show(Contract::findOrFail($id));

        $show->id('Id');
        $show->customer_id('Customer id');
        $show->chance_id('Chance id');
        $show->contract_no('Contract no');
        $show->contract_status('Contract status');
        $show->contract_amount('Contract amount');
        $show->contract_short('Contract short');
        $show->sign_date('Sign date');
        $show->receive_date('Receive date');
        $show->electronic('Electronic');
        $show->remark('Remark');
        $show->creator('Creator');
        $show->is_low_price('Is low price');
        $show->contract_pid('Contract pid');
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
        $form = new Form(new Contract);

        $form->tab('合同信息', function ($form) {
            $form->row(function ($row) {
                $row->width(4)->select('customer_id', 'Customer id')->options('/api/customers');
                $row->width(4)->text('chance_id', 'Chance id');
                $row->width(4)->text('contract_no', 'Contract no');
                $row->width(4)->text('contract_status', 'Contract status');
                $row->width(4)->decimal('contract_amount', 'Contract amount');
                $row->width(4)->text('contract_short', 'Contract short');
                $row->width(4)->date('sign_date', 'Sign date')->default(date('Y-m-d'));
                $row->width(4)->date('receive_date', 'Receive date')->default(date('Y-m-d'));
                $row->width(4)->text('electronic', 'Electronic');
                $row->width(4)->text('remark', 'Remark');
                $row->width(4)->text('creator', 'Creator');
                $row->width(4)->text('is_low_price', 'Is low price');
                $row->width(4)->text('contract_pid', 'Contract pid');
            }, $form);
        })->tab('收款信息', function ($form) {
            $form->hasMany('payments', '收款单', function ($form) {
                $form->text('detail_id', 'Detail id');
                $form->text('contract_id', 'Contract id');
                $form->select('customer_id', 'Customer id')->options('/api/customers');
                $form->text('collect_type', 'Collect type');
                $form->text('collect_status', 'Collect status');
                $form->text('collect_voucher', '汇款凭证')->default('');
//                $form->image('collect_voucher', '汇款凭证')->move('public/upload/voucher/')->uniqueName();
                $form->text('collect_account', 'Collect account');
                $form->decimal('collect_amount', 'Collect amount');
                $form->decimal('al_collect_amount', 'Al collect amount');
                $form->date('expect_collect_time', 'Expect collect time')->default(date('Y-m-d'));
                $form->date('collect_time', 'Collect time')->default(date('Y-m-d'));
                $form->text('check_user', 'Check user');
                $form->date('check_date', 'Check date')->default(date('Y-m-d'));
                $form->text('is_invoice', 'Is invoice');
                $form->text('remark', 'Remark');
                $form->text('creator', 'Creator')->default(Admin::user()->id);
            });
        });
        return $form;
    }
}

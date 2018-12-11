<?php

namespace App\Admin\Controllers;

use App\Contact;
use App\Http\Controllers\Controller;
use Encore\Admin\Admin;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class ContactController extends Controller
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
        $grid = new Grid(new Contact);

        $grid->id('Id');
        $grid->customer()->company_name('公司名称')->style('width:200px;word-break:break-all;');
        $grid->customer()->shop_name('店铺名称')->style('width:200px;word-break:break-all;');
        $grid->man('Man');
        $grid->department('Department');
        $grid->title('Title');
        $grid->email('Email');
        $grid->mobile('Mobile');
        $grid->qq('Qq');
        $grid->wechat('Wechat');
        $grid->remark('Remark');
        $grid->creator('Creator');
        $grid->created_at('Created at');
        $grid->updated_at('Updated at');

        $grid->actions(function ($actions) {
            $actions->prepend('<a href="customers/' . $actions->row->customer_id . '"><i class="fa fa-paper-plane"></i></a>');
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
        $show = new Show(Contact::findOrFail($id));

        $show->id('Id');
        $show->customer()->company_name('公司名称');
        $show->man('Man');
        $show->department('Department');
        $show->title('Title');
        $show->email('Email');
        $show->mobile('Mobile');
        $show->qq('Qq');
        $show->wechat('Wechat');
        $show->remark('Remark');
        $show->creator('Creator');
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
        return \Encore\Admin\Facades\Admin::form(Contact::class, function (Form $form) {
            $form->row(function ($row) use ($form) {
                $row->width(4)->select('customer_id', '公司名称')->options('/api/customers');
                $row->width(4)->text('man', 'Man');
                $row->width(4)->text('department', 'Department');
                $row->width(4)->text('title', 'Title');
                $row->width(4)->email('email', 'Email')->rules('email');
                $row->width(4)->mobile('mobile', 'Mobile');
                $row->width(4)->text('qq', 'Qq');
                $row->width(4)->text('wechat', 'Wechat');
                $row->width(4)->text('remark', 'Remark');
                $row->width(4)->select('creator', 'Creator')->options('/api/admins')->default(\Encore\Admin\Facades\Admin::user()->id);
            }, $form);
        });
    }
}

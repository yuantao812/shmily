<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('detail_id')->comment('详情表主键ID');
            $table->integer('contract_id')->comment('合同id');
            $table->integer('customer_id')->comment('客户ID');
            $table->tinyInteger('collect_type')->default(0)->comment('收款类型0普通收款 1服务费');
            $table->tinyInteger('collect_status')->comment('状态');
            $table->string('collect_voucher', 100)->comment('汇款凭证');
            $table->tinyInteger('collect_account')->comment('到款账号');
            $table->decimal('collect_amount', 19, 2)->comment('应收金额');
            $table->decimal('al_collect_amount', 19, 2)->comment('已确认金额');
            $table->date('expect_collect_time')->comment('预期收款时间');
            $table->date('collect_time')->comment('实际收款时间');
            $table->integer('check_user')->comment('财务审核人');
            $table->date('check_date')->comment('财务审核日期');
            $table->tinyInteger('is_invoice')->comment('是否开票');
            $table->string('remark', 1024)->comment('备注');
            $table->integer('creator')->comment('创建人');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payments');
    }
}

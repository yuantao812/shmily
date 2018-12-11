<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContractsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contracts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('customer_id')->comment('客户ID');
            $table->integer('chance_id')->comment('销售机会ID');
            $table->string('contract_no', 50)->comment('合同编号');
            $table->integer('contract_status')->comment('合同状态');
            $table->decimal('contract_amount', 19, 2)->comment('合同金额');
            $table->string('contract_short', 50)->comment('合同简称');
            $table->date('sign_date')->comment('合同签署日期');
            $table->date('receive_date')->comment('合同收到日期');
            $table->integer('electronic')->comment('是否有电子版合同');
            $table->string('remark', 1024)->comment('合同备注');
            $table->integer('creator')->comment('创建者');
            $table->integer('is_low_price')->comment('是否低价');
            $table->integer('contract_pid')->default(0)->comment('主合同');
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
        Schema::dropIfExists('contracts');
    }
}

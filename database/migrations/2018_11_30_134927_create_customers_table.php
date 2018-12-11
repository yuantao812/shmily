<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('customer_no', 190)->unique();//客户编号
            $table->tinyInteger('customer_status')->default(0);//客户状态
            $table->string('company_name')->nullable();//公司名称
            $table->string('shop_name')->nullable();//店铺名称
            $table->string('customer_industry', 100)->nullable();//客户行业
            $table->string('customer_type', 100)->nullable();//客户类型
            $table->string('shop_type', 100)->nullable();//店铺类型
            $table->string('customer_area')->nullable();//客户地区
            $table->string('customer_level')->nullable();//客户等级
            $table->string('customer_nature')->nullable();//客户性质
            $table->integer('customer_introducer')->nullable();//老客户介绍人
            $table->integer('employee_introducer')->nullable();//内部介绍人
            $table->timestamp('success_time')->nullable();//成交时间
            $table->timestamp('to_customer_time')->nullable();//线索转客户时间
            $table->timestamp('to_open_sea_time')->nullable();//成交时间
            $table->timestamp('close_time')->nullable();//关闭时间
            $table->timestamp('active_time')->nullable();//激活时间
            $table->timestamp('loss_time')->nullable();//流失时间
            $table->integer('protect_user')->nullable();//保护人
            $table->integer('creator')->nullable();//创建人
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
        Schema::dropIfExists('customers');
    }
}

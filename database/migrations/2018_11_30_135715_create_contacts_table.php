<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('customer_id')->comment('客户ID');
            $table->string('man', 50)->comment('联系人');
            $table->string('department', 50)->comment('联系人部门');
            $table->string('title', 50)->comment('联系人职位');
            $table->string('email', 50)->comment('联系人邮箱');
            $table->string('mobile', 50)->comment('联系人手机号');
            $table->string('qq', 50)->comment('联系人qq');
            $table->string('wechat', 50)->comment('系人微信');
            $table->string('remark', 50)->comment('联系人备注');
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
        Schema::dropIfExists('contacts');
    }
}

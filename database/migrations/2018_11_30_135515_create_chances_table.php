<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chances', function (Blueprint $table) {
            $table->increments('id');
            $table->string('chance_name')->comment('机会名称');
            $table->integer('customer_id')->comment('客户ID');
            $table->integer('business_id')->comment('商机ID');
            $table->string('remark', 200)->comment('商机备注');
            $table->decimal('estimated_amount', 19, 2)->comment('预估成单金额');
            $table->date('estimated_date')->comment('预估成交时间');
            $table->string('step', 50)->comment('当前阶段');
            $table->tinyInteger('status')->comment('当前状态0跟进1赢单2输单');
            $table->integer('competitor')->comment('竞争对手 对应dict_old_software表');
            $table->decimal('competitor_amount', 19, 2)->comment('竞争对手签约金额');
            $table->integer('competitor_order')->comment('竞争对手签约单量');
            $table->date('competitor_date')->comment('竞争对手到期时间');
            $table->integer('lose_reason')->comment('输单原因');
            $table->string('lose_remark', 200)->comment('输单原因备注');
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
        Schema::dropIfExists('chances');
    }
}

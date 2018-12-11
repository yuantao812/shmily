<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('customer_id', 50)->comment('客户ID');
            $table->string('address', 50)->comment('地址');
            $table->double('longitude', 10, 6)->comment('经度');
            $table->decimal('latitude', 10, 6)->comment('纬度');
            $table->string('address_type', 50)->comment('地址类型');
            $table->string('creator', 50)->comment('创建人');
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
        Schema::dropIfExists('addresses');
    }
}

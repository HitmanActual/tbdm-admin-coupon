<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminCouponTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_coupons', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code');
            $table->enum('discount',['percentage','flat']);
            $table->float('value')->default(0);
            $table->date('start_date');
            $table->date('end_date');
            $table->integer('remaining_days')->default(0);
            $table->enum('usage',['single','multiple']);
            $table->integer('counter')->unsigned()->default(0);
            $table->integer('max_counter')->unsigned()->default(0);
            $table->integer('user_id')->unsigned();
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
        Schema::dropIfExists('admin_cuopons');
    }
}

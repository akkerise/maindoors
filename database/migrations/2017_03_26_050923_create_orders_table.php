<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('receiver_email')->nullable();

            $table->string('order_code')->nullable();
            $table->string('payment_type')->nullable();
            $table->string('payment_method')->nullable();
            $table->integer('total_amount')->nullable();
            $table->integer('price')->nullable();
            $table->text('information')->nullable();

            $table->string('bank_code')->nullable();
            $table->tinyInteger('transaction_status');
            $table->integer('voucher_percent')->nullable();
            $table->integer('voucher_money')->nullable();
            $table->integer('customer_id')->nullable();
            //                Ngân Lượng field
            $table->text('transaction_info')->nullable();

            $table->integer('tax_amount')->nullable();
            $table->integer('discount_amount')->nullable();
            $table->integer('free_shipping')->nullable();
            $table->text('order_description')->nullable();

            $table->integer('payment_id')->nullable();
            $table->text('error_text')->nullable();
            $table->string('secure_code')->nullalbe();
            $table->string('buyer_mobile')->nullable();
            $table->string('buyer_name')->nullable();
            $table->string('buyer_email')->nullable();
            $table->integer('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
//            $table->integer('customer_id')->unsigned()-;
//            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
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
        Schema::dropIfExists('orders');
    }
}

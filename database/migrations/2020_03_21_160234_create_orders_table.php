<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->bigIncrements('id');

            $table->string('order_number');
            $table->unsignedBigInteger('user_id');
            $table->enum('status', ['pending','processing','completed','decline'])->default('pending');
            $table->bigInteger('grand_total');
            $table->integer('item_count');
            $table->boolean('is_paid')->default(false);
            $table->enum('payment_method', ['cash_on_delivery','paypal'])->default('cash_on_delivery');

            $table->string('booking_firstname');
            $table->string('booking_lastname');
            $table->string('booking_address');
            $table->string('booking_city');
            $table->string('booking_state');
            $table->string('booking_zipcode');
            $table->string('booking_phone');
            $table->string('booking_email');
            $table->string('notes')->nullable();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

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

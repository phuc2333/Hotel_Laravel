<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->text('about_heading');
            $table->text('about_content');
            $table->integer('about_status');

            $table->text('checkout_heading');
            $table->integer('checkout_status');
            $table->text('cart_heading');
            $table->integer('cart_status');
            $table->text('payment_heading');
            $table->text('signup_heading');
            $table->integer('signup_status');
            $table->text('signin_heading');
            $table->integer('signin_status');
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
        Schema::dropIfExists('pages');
    }
};

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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->text('name');
            $table->string('email');
            $table->unique('email', 'unique_email');
            $table->text('password');
            $table->text('phone')->nullable();
            $table->text('country')->nullable();
            $table->text('address')->nullable();
            $table->text('state')->nullable();
            $table->text('city')->nullable();
            $table->text('zip')->nullable();
            $table->text('photo')->nullable();
            $table->text('token')->nullable();
            $table->integer('status');
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
        Schema::dropIfExists('customer');
    }
};

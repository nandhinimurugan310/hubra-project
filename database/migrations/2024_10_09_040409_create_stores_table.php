<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
    Schema::create('stores', function (Blueprint $table) {
        $table->id();
        $table->string('logo')->nullable();
        $table->string('address');
        $table->string('name');
        $table->string('website')->nullable();
        $table->string('phone');
        $table->string('open_hours');
        $table->string('email');
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
        Schema::dropIfExists('stores');
    }
}

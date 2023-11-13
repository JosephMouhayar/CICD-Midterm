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
        Schema::create('food', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string("image");
            $table->string("name");
            $table->string("description");
            $table->integer("calorieCount");
            $table->double("price");
            $table->boolean("isPlatDuJour");
            $table->integer("offer")->nullable();
            $table->unsignedInteger("idCategory");
            $table->foreign('idCategory')->references('id')->on('categories')->onDelete('cascade');
            $table->unsignedInteger("idCook");
            $table->foreign('idCook')->references('id')->on('user_apps')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('food');
    }
};

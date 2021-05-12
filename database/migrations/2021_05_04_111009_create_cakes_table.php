<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCakesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cakes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('nbrPersons');
            $table->integer('shape');
            $table->string('tastes');
            $table->boolean('vegan')->nullable();
            $table->json('decoration')->nullable();
            $table->string('specificities')->nullable();
            $table->integer('status')->default('1');
            $table->dateTime('DeliveryDate')->nullable();
            $table->boolean('isForDelivery')->nullable();
            $table->integer('user_id')->nullable();
            $table->string('client_name');
            $table->integer('client_phone');
            $table->string('client_email')->nullable();
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
        Schema::dropIfExists('cakes');
    }
}

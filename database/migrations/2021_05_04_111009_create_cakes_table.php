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
            $table->string('shape');
            $table->string('tastes');
            $table->string('vegan')->nullable();
            $table->json('decoration')->nullable();
            $table->string('specificities')->nullable();
            $table->integer('status')->default('1');
            $table->dateTime('DeliveryDate')->nullable();
            $table->string('isForDelivery')->nullable();
            $table->string('client_name');
            $table->integer('client_phone')->nullable();
            $table->string('client_email')->nullable();
            $table->integer('price')->default('0');
            $table->integer('advance_payment')->nullable();
            $table->timestamps();
            $table->foreignId('user_id')->nullable()->constrained("users");
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

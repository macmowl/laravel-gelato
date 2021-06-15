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
            $table->boolean('vegan')->nullable();
            $table->json('decoration')->nullable();
            $table->string('specificities')->nullable();
            $table->integer('status')->default('1');
            $table->dateTime('DeliveryDate')->nullable();
            $table->boolean('isForDelivery')->nullable();
            $table->string('client_name');
            $table->integer('client_phone')->nullable();
            $table->string('client_email')->nullable();
            $table->timestamps();
            $table->foreignId('user_id')->nullable()->constrained("users")->cascadeOnUpdate()->nullOnDelete();
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

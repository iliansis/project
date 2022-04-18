<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateZakazsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('zakazs', function (Blueprint $table) {
            $table->id();
            $table->integer('delivery');
            $table->integer('payment');
            $table->string('city');
            $table->string('street');
            $table->integer('house');
            $table->integer('flat');
            $table->text('com');
            $table->string('status');
            $table->integer('sum');
            $table->bigInteger('user');     
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
        Schema::dropIfExists('zakazs');
    }
}

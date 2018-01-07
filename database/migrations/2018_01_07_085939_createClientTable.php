<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table){
        	$table->increments('id');
        	$table->string('name');
        	$table->string('city')->nullable();
        	$table->timestamp('last_order')->nullable();
        	$table->longText('notes')->nullable();
			$table->decimal('amount')->default('0');
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
        //
    }
}
